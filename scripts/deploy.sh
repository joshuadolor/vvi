#!/usr/bin/env bash
# Deploy VVI on the server: update master, rebuild assets, refresh Laravel.
# Usage (from repo root or anywhere):
#   ./scripts/deploy.sh
#   bash scripts/deploy.sh
#
# Run on the production host.

set -euo pipefail

BRANCH="${DEPLOY_BRANCH:-master}"
APP_CONTAINER="${APP_CONTAINER:-vvi_app}"
COMPOSE="${COMPOSE:-docker compose}"

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

log() { printf '\n==> %s\n' "$*"; }
die() { printf 'ERROR: %s\n' "$*" >&2; exit 1; }

command -v git >/dev/null || die "git is required"
command -v docker >/dev/null || die "docker is required"

log "Project: $ROOT"
log "Branch:  $BRANCH"

# --- Git update ---------------------------------------------------------------
log "Fetching and updating $BRANCH"
git fetch origin "$BRANCH"

if ! git diff --quiet || ! git diff --cached --quiet; then
  die "Working tree has local changes. Commit, stash, or discard them before deploying."
fi

git checkout "$BRANCH"
git pull --ff-only origin "$BRANCH"

# Keep production secrets; never overwrite .env from git
if [[ ! -f .env ]]; then
  die ".env is missing. Copy .env.example and configure production values first."
fi

# --- Ensure stack is up -------------------------------------------------------
log "Ensuring Docker services are running"
$COMPOSE up -d app web

# Wait briefly for app container
if ! docker ps --format '{{.Names}}' | grep -qx "$APP_CONTAINER"; then
  die "Container $APP_CONTAINER is not running. Check: docker compose ps"
fi

# --- PHP dependencies ---------------------------------------------------------
log "Installing Composer dependencies"
docker exec -w /var/www/html "$APP_CONTAINER" \
  composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# --- Front-end build (Tailwind + SCSS via Vite) -------------------------------
log "Building front-end assets"
$COMPOSE run --rm node sh -c "npm ci || npm install && npm run build"

# Remove Vite HMR marker so production uses built assets
rm -f public/hot

# --- Database + Laravel caches ------------------------------------------------
log "Running migrations"
docker exec -w /var/www/html "$APP_CONTAINER" php artisan migrate --force

log "Clearing and rebuilding caches"
docker exec -w /var/www/html "$APP_CONTAINER" php artisan optimize:clear
docker exec -w /var/www/html "$APP_CONTAINER" php artisan config:cache
docker exec -w /var/www/html "$APP_CONTAINER" php artisan route:cache
docker exec -w /var/www/html "$APP_CONTAINER" php artisan view:cache

# --- Writable paths (SQLite + storage) ----------------------------------------
log "Fixing ownership for www-data"
docker exec -u root -w /var/www/html "$APP_CONTAINER" sh -c '
  mkdir -p storage/framework/{sessions,views,cache/data} storage/logs bootstrap/cache database
  touch database/database.sqlite
  chown -R www-data:www-data storage bootstrap/cache database
  chmod -R 775 storage bootstrap/cache database
  chmod 664 database/database.sqlite
'

# --- Restart PHP so opcache/config refreshes ----------------------------------
log "Restarting app container"
$COMPOSE restart app

log "Deploy complete"
printf 'Tip: confirm CSS is https://\n  curl -sL https://victorvanguardinternational.com/ | grep -oE "href=\\\"[^\\\"]+\\.css\\\"" | head -3\n'
