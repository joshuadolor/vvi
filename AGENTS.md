# AGENTS.md - Victor Vanguard International (VVI)

Guidance for AI coding agents (and humans) working in this repo. Keep changes small and follow the patterns already here.

## What this project is
A B2B sourcing / supplier-verification platform for Victor Vanguard International.
- Company background: `docs/COMPANY_INFORMATION.md`
- Design system ("Industrial Elite"): `docs/landing-page/industrial_elite/DESIGN.md`
- Reference UI mockups: `docs/landing-page/*/code.html`
- Roadmap / task checklist: `docs/ROADMAP.md` (work top-to-bottom; check items off as you finish)

## Tech stack (do not swap without being asked)
- Backend: Laravel 13, PHP 8.4
- Database: SQLite (`database/database.sqlite`) - file-based, no DB server
- Public/marketing pages: server-rendered Blade (for SEO + AI crawlers)
- Role dashboards (admin/staff, supplier, customer): Vue 3 SPA mounted on a Blade shell (added in a later phase)
- Styling: Tailwind CSS v3 + SCSS, compiled by Vite
- Everything runs in Docker

## Architecture rule (important)
- Anything that must be found by search engines or AI agents = Blade, server-rendered, with JSON-LD.
- Anything behind login (dashboards) = Vue SPA calling internal JSON routes (session auth via Sanctum).

## Run it
```bash
docker compose up --build       # app at http://localhost:8080
```
`node` builds assets then exits; `app` (php-fpm) waits for it, `web` (nginx) serves on :8080.

Common commands (run inside the app container):
```bash
docker compose exec app php artisan migrate
docker compose exec app php artisan make:model Product -mc
docker compose run --rm node npm run dev -- --host 0.0.0.0   # Vite HMR on :5173
docker compose run --rm node npm run build                   # one-off asset build
```
No local PHP/Composer/Node needed - use the containers.

## Where things go
- Public pages: `resources/views/pages/*.blade.php` extending `resources/views/layouts/public.blade.php`
- SEO/meta: set `$title`, `$description` when returning a view; JSON-LD via `resources/views/partials/jsonld.blade.php` + `@push('jsonld')`
- Company facts (single source of truth): `config/company.php`
- Styles: `resources/scss/app.scss` (+ `_tokens.scss`); design tokens live in `tailwind.config.js`
- Routes: `routes/web.php`
- SEO files: `public/robots.txt`, `public/llms.txt`, `/sitemap.xml` route in `routes/web.php`

## Design tokens (use these Tailwind classes, not raw hex)
- Colors: `bg-surface`, `text-on-surface`, `text-dragon-red`, `text-secondary` (gold), `border-outline-variant`, `bg-surface-container-low/lowest`
- Type: `font-display-lg`/`text-display-lg` (Bodoni serif), `font-body-md`/`text-body-md` (Hanken), `font-label-caps`/`text-label-caps` (Geist, uppercase)
- Spacing: `px-margin-desktop`, `gap-gutter`, `max-w-container-max`
- Shapes: sharp corners (0px radius) by default; buttons/cards stay square.
- Custom helpers in SCSS: `.metallic-sheen`, `.luxury-gradient`, `.hide-scrollbar`, `.serif-italic`.

## Conventions
- Roles are a `users.role` enum: `admin | staff | supplier | customer`. Gate routes with middleware.
- Verification is admin-gated: suppliers have `verification_status`, products have `status` (both pending/approved|verified/rejected).
- Do not add narrating comments. Explain intent only when non-obvious.
- After edits, keep the landing page building (`docker compose run --rm node npm run build`).
