# Mashariki — Unified Platform

One Laravel app serving three Mashariki brands from one codebase, with a
Filament-powered CMS/admin panel. See `config/brands.php` for the per-brand
configuration (name, host, colors, nav, socials).

- **Mashariki Group** — the parent hub (`config('brands.group')`)
- **Mashariki Arts Academy** — creative academy (`config('brands.academy')`)
- **Masharket** — content market (`config('brands.market')`)

`masharikifestival.org` (WordPress, run by a different team) is out of scope —
linked to, never merged.

## Local setup

Requires **PHP 8.2+**. If your system default `php` is older (check with
`php -v`), install 8.2 via Homebrew and invoke it explicitly:

```bash
brew install php@8.2
/opt/homebrew/opt/php@8.2/bin/php artisan serve
```

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # DB_CONNECTION=sqlite in .env
php artisan migrate
npm install && npm run build
```

### Routing to brand domains locally

Each brand is served via `Route::domain()` groups (see `routes/web.php`),
resolved from `config('brands.*.host')`. Add these to `/etc/hosts` to browse
all three brands locally:

```
127.0.0.1  mashariki-group.test
127.0.0.1  mashariki-academy.test
127.0.0.1  masharket.test
```

Then run `php artisan serve` and visit `http://mashariki-group.test:8000`
etc. (Laravel's dev server ignores the Host header for binding but routes
correctly once the request arrives, so `/etc/hosts` + port 8000 is enough —
no vhost config needed.)

## CMS / Admin panel

Filament admin panel lives at `/admin`, reachable **only on the Group hub
domain** (`mashariki-group.test/admin`) — it does not resolve on the academy
or market domains. Content resources are organized into per-brand navigation
groups inside the single panel (no multi-tenancy package; see project brief).

Create an admin user:

```bash
php artisan make:filament-user
```

## Status

- **Phase 0 (audit):** done.
- **Phase 1 (unified shell + design system + CMS foundation):** done — shared
  layout/nav/footer are brand-driven via `config('brands.php')` +
  `SetBrand` middleware; domain route groups scaffolded; Filament installed
  and panel stood up.
- **Phase 2 (market rebuild):** in progress — homepage ported into Blade on
  the shared design system (Masharket's yellow as its accent color), with
  event dates/venue/intro copy/contact info/registration categories/partner
  logos all CMS-managed via Filament (`MarketSettings`, `MarketCategory`,
  `MarketPartner`). Event dates are intentionally blank until set in the CMS
  — see `MarketContentSeeder` for why.

  **All four registrant types are now built end-to-end**: Exhibitor,
  Non-Exhibitor, Virtual Attendant (all three: full company/contact form +
  service/genre checkboxes, `unpaid` by default) and Student (simpler
  school-details form, auto-`paid` since student attendance is free — matches
  the old app's behavior). Each has a public form under `/register/*`, an
  Eloquent model, and a Filament admin resource (`Masharket` nav group) with
  search/filters and, for the three paid types, a one-click "Mark Paid/Unpaid"
  toggle. The homepage's four registration category cards link to their
  respective forms.

  The old PayPal integration was **not** ported — it was a non-functional
  stub (hardcoded `$0.01` charge regardless of registrant type, sandbox
  credentials committed directly in the old repo, return URLs pointing at a
  different domain). Real payment integration is deferred until there's a
  real gateway account and real per-type pricing to wire up; for now,
  registrations land as `unpaid` and admins mark them paid manually (bank
  transfer, mobile money, etc.) via Filament.

  **Waiver codes** (`WaiverCode` model, `Masharket` nav group in Filament)
  let admins generate one-time codes in bulk ("Generate Codes" action, 1-200
  at a time). A registrant redeems one at `/waiver` with their registration
  type + email; a valid, unused code marks them `paid` and redirects to their
  ticket. Codes can't be reused (verified: redeeming twice rejects the
  second attempt). Note: the old app's *cinema/event ticket sales* subsystem
  (`generate_ticket.php`, screenings at named cinemas, concessions) is a
  separate, unrelated product bundled in the same old repo — its QR
  generation was hardcoded to a fake placeholder string, non-functional. It
  was intentionally not touched; nothing here relates to it.

  **Tickets**: paid registrants (all types) get a real ticket at
  `/ticket/{type}/{registration_id}` — registration ID, name,
  company/school, event dates/venue, and an actual working QR code
  (`simplesoftwareio/simple-qrcode`, not the old stub) encoding the
  registration ID. Unpaid/nonexistent registrations are blocked (redirect or
  404, both verified). Every registration confirmation message includes the
  registrant's ticket URL, and Filament tables have a "View Ticket" action
  (shown only once paid, except Students who are always paid).

  **Content pages** (About, Events, Program, Delegates, Calendar, Tours,
  Media, Gallery, FAQs) are now ported — these were the pages linked from
  the old site's main nav. Several went beyond a straight port:
  - **Program**: the old page hardcoded "November 7th, 2024" etc. directly
    into the day tabs — the exact stale-date bug this migration exists to
    fix. `MarketProgramSession` stores only a day *number*; the actual date
    label is computed from `MarketSettings::start_date` at render time, so
    it can't go stale again. All 19 real session entries (3 days) ported.
  - **Delegation**: the old page gated a delegate directory behind a fake
    client-side `sessionStorage` check (not real auth). Rebuilt as a public
    directory of confirmed-paid registrants pulled live from all four
    registration tables — no fake gate.
  - **FAQs** (13), **Program sessions**, **Gallery images**, and **News/Press
    articles** (7, ported faithfully including the original Kinyarwanda and
    French pieces) are all now Filament resources instead of one static PHP
    file per item — editable without a developer.
  - **Skipped on purpose**: the Events page's 38-image hardcoded venue floor
    plan from one specific past edition — one-time, non-reusable content,
    not worth preserving as static assets. Exhibition/Conference/
    Workshop/Pitching route to a shared "coming soon" view since the live
    site had no real content there either. Tours' external accommodation
    link had a hardcoded 2023 date range in its query string — stripped.
  - Gallery seeded with a representative sample (10 venue + 10 press images)
    from the old site's much larger photo dump; more can be added anytime
    via Filament without touching code.

  **Newsletter subscription**: the old homepage footer had a subscribe form
  that pushed to Mailchimp using an API key committed directly in the old
  repo — another hardcoded credential I didn't replicate (same call as
  PayPal). Built the local capture instead: `MarketSubscriber` model, a
  footer form (market brand only) with duplicate-email rejection, and a
  Filament resource to view/manage the list. Wiring it to a real email
  marketing provider is future work once real credentials exist.

  **Registrant login/dashboard**: registrants (all 4 types) can now log in
  at `/login` with the email/password they set at registration. Since each
  type lives in its own table (not a shared `users` table), auth is a
  lightweight session-based check (`RegistrantLocator` searches all 4 tables
  by email) rather than Laravel's normal single-guard pattern — simpler than
  standing up 4 separate auth guards for what's ultimately "find this email,
  check this hash." The dashboard shows payment status, a "View Ticket" link
  once paid, a waiver-code link if not, and lets registrants edit their own
  contact/company/school details (mirrors the old app's `reg_*_edit.php`
  pages). Verified end-to-end: registered, logged in, edited details
  (confirmed in DB), logged out, confirmed the dashboard route re-blocks
  access immediately after.

  **Admin reporting**: a stats widget on the Filament dashboard shows
  registration counts and paid/unpaid breakdowns per type, waiver code
  usage, and subscriber count. A "Registrations Report" page (`Masharket`
  nav group) lists every registrant across all 4 types in one table with a
  CSV export button. Export is a plain synchronous CSV stream, not
  Filament's built-in queued Exporter — that needs a jobs table and a queue
  worker running, which is more infrastructure than this needs for what's
  fundamentally a one-shot download.

  **Still not done:** the payment.php page (superseded by the waiver flow)
  and anything requiring a real payment gateway. The old site has ~686 PHP
  files total; do not retire it until full parity is reached.
- **Phase 3 (academy):** done — Academy's public pages (home, about,
  programs, admissions, contact) are ported into `resources/views/academy/*`
  on the shared design system, served from the academy domain group via
  `AcademyController`. The admissions form posts to `ApplicationController`,
  which persists to the `applications` table and emails the admin +
  applicant exactly as before. Applications are now reviewed via the
  `Applications` Filament resource instead of the old bespoke
  `/admin/applications` Blade views — canCreate is disabled since records
  only ever come from the public form. Academy's standalone Breeze
  auth/dashboard/profile system was intentionally **not** ported: it wasn't
  linked from anywhere in the academy's own UI and had no real feature built
  on top of it (just default scaffolding). If a real student-facing account
  system is wanted later, that's new scope, not a migration.
  The five program specializations (Videography & Lighting, Sound Design,
  Screenwriting & Directing, Art Direction, Editing) are now CMS-managed via
  the `AcademyProgram` Filament resource — this single list now drives the
  services page display, the admissions form's radio buttons, application
  validation, and the Filament application-review filters/form, so editing
  it in one place actually changes what the form accepts. (Note: the
  originally-passed `$programs`/`$disciplines` controller variables in the
  old academy app were dead code — never rendered by the view. The real
  content was an inline `$learningAreas` array in `services.blade.php`,
  which is what got moved into the CMS.)
- **Phase 4 (domains + cutover):** not started — do not touch DNS until
  explicitly approved.
