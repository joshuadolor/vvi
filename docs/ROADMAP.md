# VVI Build Roadmap & Checklist

Work top-to-bottom. Each item is small and specific on purpose - do one, check it off, move on.
Mark done by changing `[ ]` to `[x]`. See `AGENTS.md` for stack rules and commands.

Legend: (B)=Blade/public, (V)=Vue dashboard, (DB)=migration/model, (API)=internal JSON route.

---

## Phase 0 - Scaffold & Docker  (DONE)
- [x] Laravel 13 app created in repo root, SQLite configured (`.env` DB_CONNECTION=sqlite)
- [x] Dockerized: `Dockerfile`, `docker-compose.yml`, `docker/nginx/default.conf`, `docker/php/local.ini`
- [x] App boots at http://localhost:8080 via `docker compose up --build`

## Phase 1 - Landing page  (DONE)
- [x] Tailwind v3 + SCSS toolchain (`tailwind.config.js`, `postcss.config.js`, `resources/scss/app.scss`)
- [x] Industrial Elite tokens ported into `tailwind.config.js`
- [x] Public layout with SEO meta + Open Graph + canonical (`resources/views/layouts/public.blade.php`)
- [x] Organization JSON-LD (`resources/views/partials/jsonld.blade.php`)
- [x] Home page (`resources/views/pages/home.blade.php`) routed at `/`
- [x] `robots.txt`, `llms.txt`, dynamic `/sitemap.xml`

---

## Phase 2 - More public pages + SEO depth
- [ ] (B) Create `pages/services.blade.php` listing the 5 core services from `config/company.php`; route `/services`.
- [ ] (B) Create `pages/about.blade.php` from `docs/COMPANY_INFORMATION.md`; route `/about`.
- [ ] (B) Create `pages/catalog.blade.php` (grid of approved products); route `/catalog`.
- [ ] (B) Create `pages/product.blade.php` (single product); route `/catalog/{product:slug}`.
- [ ] Add per-page `$title`/`$description` for each new page.
- [ ] Add `BreadcrumbList` + `ItemList` JSON-LD on `/catalog`, `Product` JSON-LD on product page (via `@push('jsonld')`).
- [ ] Add every new public URL to the `$urls` array in the sitemap route (`routes/web.php`).

## Phase 3 - Auth & roles
- [ ] (DB) Add `role` enum column to `users` (`admin|staff|supplier|customer`), default `customer`. Migration + cast on `App\Models\User`.
- [ ] Install auth scaffolding: `docker compose exec app composer require laravel/breeze --dev` then `php artisan breeze:install blade`.
- [ ] Create `EnsureRole` middleware; register alias in `bootstrap/app.php` `withMiddleware`.
- [ ] Add route groups: `/admin/*` (admin,staff), `/supplier/*` (supplier), `/account/*` (customer).
- [ ] Seed one admin user in `database/seeders/DatabaseSeeder.php`.
- [ ] Install Sanctum for SPA cookie auth: `composer require laravel/sanctum`, publish config, add stateful middleware.

## Phase 4 - Supplier onboarding (admin/staff create suppliers)
- [ ] (DB) `suppliers` table: `user_id`, `company_name`, `country`, `contact_email`, `verification_status` enum(pending|verified|rejected) default pending, `notes`, timestamps. Model `App\Models\Supplier` (belongsTo User).
- [ ] (API) Admin endpoints: list/create/update supplier; creating a supplier creates the linked `user` with role `supplier` and a temp password / invite.
- [ ] (V) Admin dashboard screen "Suppliers": table + "Onboard supplier" form.
- [ ] Admin can set `verification_status` to verified/rejected (this is the "VVI Verified" mark).

## Phase 5 - Supplier products (submitted, admin-verified)
- [ ] (DB) `categories` table seed: Prefab, Solar, Machinery, Logistics. Model `App\Models\Category`.
- [ ] (DB) `products` table: `supplier_id`, `category_id`, `name`, `slug`, `sku`, `description`, `status` enum(pending|approved|rejected) default pending, timestamps. Model `App\Models\Product`.
- [ ] (API) Supplier endpoints: list own products, create/edit product (always created as `pending`).
- [ ] (V) Supplier dashboard: "My products" list + create/edit form; show status badge.
- [ ] (API) Admin endpoints: list pending products, approve/reject.
- [ ] (V) Admin dashboard: "Product verification" queue (approve/reject).
- [ ] Only `status = approved` products appear in the public `/catalog`.

## Phase 6 - Customers & orders
- [ ] Customer self-registration (Breeze register) sets role `customer`.
- [ ] (DB) `orders` table: `customer_id`(user), `status` enum(draft|submitted|confirmed|cancelled) default draft, timestamps. Model `App\Models\Order`.
- [ ] (DB) `order_items` table: `order_id`, `product_id`, `quantity`, `unit_note`. Model `App\Models\OrderItem`.
- [ ] (API) Customer endpoints: create order from approved products, add items, submit order.
- [ ] (V) Customer dashboard: browse approved products, build an order, view order history.
- [ ] (V) Admin dashboard: view/confirm submitted orders.

## Phase 7 - Vue SPA wiring (supports Phases 4-6)
- [ ] Add deps: `docker compose run --rm node npm install vue@^3 @vitejs/plugin-vue`.
- [ ] Add `@vitejs/plugin-vue` to `vite.config.js`; add `resources/js/dashboard/main.js` + `App.vue` + Vue Router.
- [ ] Add Blade shell `resources/views/dashboard.blade.php` mounting `#app`; route `/dashboard`.
- [ ] Axios/fetch wrapper that sends the Sanctum XSRF cookie.

## Phase 8 - SEO / AI-ready polish
- [ ] Real Open Graph image at `public/images/og-default.jpg`.
- [ ] Update `robots.txt` + sitemap absolute URLs to production `APP_URL` (currently localhost:8080).
- [ ] Keep `public/llms.txt` in sync when pages/services change.
- [ ] Add `Product` structured data feed and ensure catalog pages are server-rendered (Blade), not SPA.
- [ ] Lighthouse/SEO pass; add meta to any new pages.

---

## Definition of done for any task
1. Runs in Docker (`docker compose up`) with no errors.
2. Public/SEO content is server-rendered and appears in view-source.
3. Assets build cleanly (`docker compose run --rm node npm run build`).
4. New public URLs are in the sitemap; new facts are in `config/company.php`.
