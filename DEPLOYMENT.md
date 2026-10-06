# Deploying to cPanel — one app, four domains

This app serves four Mashariki brands from **one Laravel codebase**. Each
brand keeps its **own root domain** (none are subdomains of
`masharikigroup.org`) — Laravel picks the brand per-request from the
`Host` header via `Route::domain()` (see `routes/web.php` and
`config/brands.php`). That means all four domains must ultimately be served
by the **same** app instance on the server.

This doc originally assumed a generic cPanel host with Addon Domains and a
codebase symlinked from outside the web root. The actual host used
(**Truehost**, shared "WebHosting Starter" plan) works a little
differently — see the notes inline below wherever behavior diverged from
the generic plan.

| Brand    | Domain                         | cPanel role                        |
|----------|---------------------------------|-------------------------------------|
| Group    | `masharikigroup.org`           | Primary domain on the account       |
| Academy  | `masharikiacademy.org`         | Parked domain                       |
| Market   | `masharket.com`                | Parked domain                       |
| Festival | `www.masharikifestival.org`    | Parked domain                       |

> **Festival note:** the live site was previously a separate WordPress
> install run by another team. Cutting `masharikifestival.org` over to this
> app was a one-way decision (DNS moved off the old host). This has
> **already happened** — `www.masharikifestival.org`'s DNS points here and
> it serves this app. If you're reading this before confirming the old
> WordPress site was backed up and the other team signed off, stop and
> check that now; it's not reversible without restoring from that backup.

## 0. Prerequisites

- cPanel account with **SSH access**. Truehost provides this under
  *cPanel → Security → SSH Access*; port is **not** always 22 — check that
  page for the actual port (ours was `1624`).
- Key-based auth: generate a keypair, add the **public** key via
  *SSH Access → Manage SSH Keys → Import Key*, confirm it shows
  "Authorized". Never transmit a private key anywhere outside the machine
  that generated it.
- **PHP 8.2+**. On Truehost, `php` on `$PATH` over SSH already resolves to
  8.2+ (`ea-php82`) — no need to call a versioned binary like `php82`
  explicitly, unlike some other cPanel hosts.
- A **MySQL database** created via cPanel *MySQL Databases* (one DB, one
  user with all privileges — all four brands share it).
- Node.js locally (to build frontend assets — you will **not** run
  `npm run build` on the server; shared hosting doesn't have Node).

## 1. Add the domains in cPanel

`masharikigroup.org` is the account's primary domain. Add the other three
via *cPanel → Domains → Create A New Domain*.

**Important Truehost-specific behavior:** adding a domain here created it
as a **Parked Domain**, not an Addon Domain, even without explicitly
choosing "parked." Parked domains automatically serve whatever is in the
account's main document root (`~/public_html`) — there is **no separate
per-domain folder and no symlinking step needed** (skip step 4 below
entirely on this host). Confirm which kind you actually got with:

```bash
uapi DomainInfo list_domains
```

If your host instead gives you real **Addon Domains** (each with its own
auto-created folder under `public_html`), you'll need the symlink approach
instead — see "Addon domain variant" at the bottom of this doc.

## 2. Upload the codebase

**Truehost-specific:** this account has no convenient writable directory
outside the web root, so the whole app — `app/`, `vendor/`, `.env`,
`composer.json`, etc. — was deployed **directly into `~/public_html`**
rather than into a sibling folder with `public/` symlinked in. Source/
config protection is handled entirely by `.htaccess` instead of by
filesystem placement. If your host *does* give you a directory outside
the web root, prefer that — it's a stronger guarantee than a rewrite rule.

The live `.htaccess` is **not** the one at `public/.htaccess` in this
repo (that's Laravel's stock one, for a normal `public/`-as-docroot
deploy) — it's tracked separately at `deploy/public_html.htaccess`,
since this host's docroot *is* the app root. Upload it as `.htaccess` at
the docroot:

```bash
cd ~/public_html
git clone <your-repo-url> .   # or git pull if already cloned
cp deploy/public_html.htaccess .htaccess
composer install --no-dev --optimize-autoloader
```

**Broken hero images after upload — a real incident, now fixed in that
file.** `deploy/public_html.htaccess` denies direct access to
`app|bootstrap|config|database|resources|routes|storage|tests|vendor|
node_modules` with a blanket `[F,L]` rule — necessary, since `storage/`
here holds framework logs/sessions/cache, not just uploads. But every
image uploaded through Filament (Page Heroes, Gallery, partner logos,
etc.) is served from the **public storage disk**, and both
`asset('storage/'.$path)` calls in Blade and `Storage::disk('public')
->url()` always generate a `/storage/...` URL — which that same blanket
rule was swallowing, producing broken images in production while working
fine locally (local dev's standard `public/storage` symlink isn't
affected by this custom rule at all). Fixed with a rewrite that serves
`/storage/<path>` from `storage/app/public/<path>` — the one Laravel
convention actually expects — *before* the blanket deny rule, gated so it
only fires for files that genuinely exist there (so log/session/cache
paths under `storage/` still correctly 403, not silently 404):
```apache
RewriteCond %{REQUEST_URI} !^/storage/app/public/
RewriteCond %{DOCUMENT_ROOT}/storage/app/public/$1 -f
RewriteRule ^storage/(.+)$ /storage/app/public/$1 [L]

RewriteRule ^(app|bootstrap|config|database|resources|routes|storage(?!/app/public/)|tests|vendor|node_modules)/ - [F,L]
```
Two non-obvious things that went wrong building this, worth knowing if
you ever touch it again: (1) a naive version without the `!^/storage/
app/public/` guard **infinite-loops into a 500** — `[L]` in `.htaccess`
(per-directory) context restarts rule matching from the top with the
*rewritten* URI, so without the guard the already-rewritten path matches
the same rule again and gets `app/public/` prepended a second time,
repeatedly, until Apache's internal redirect limit trips; (2) the
substitution target needs a **leading slash** (`/storage/app/public/$1`,
not `storage/app/public/$1`) — without it, the per-directory rewrite
produced a malformed path that still landed on the deny rule.

Build frontend assets **locally** and upload `public/build/` (most shared
hosts, including Truehost, don't have Node):

```bash
npm install
npm run build
```

## 3. Configure `.env`

```bash
cd ~/public_html
cp .env.example .env
php artisan key:generate
```

Set (in addition to the usual `.env.example` keys):

```
APP_NAME="Mashariki Group"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://masharikigroup.org

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=<cpanel_db_name>
DB_USERNAME=<cpanel_db_user>
DB_PASSWORD=<cpanel_db_password>

# Brand host resolution — not in .env.example, but read by config/brands.php.
# Must match exactly what's in the Host header for each domain. Only
# Festival is www.-prefixed; the other three are apex.
BRAND_GROUP_HOST=masharikigroup.org
BRAND_ACADEMY_HOST=masharikiacademy.org
BRAND_MARKET_HOST=masharket.com
BRAND_FESTIVAL_HOST=www.masharikifestival.org

SESSION_DOMAIN=null   # leave null: these are independent sites, not subdomains — no cookie sharing needed
```

**Watch for duplicate keys.** PHP's dotenv keeps the *first* occurrence of
a repeated key silently — a real incident here: `.env` ended up with
`BRAND_GROUP_HOST` defined twice (once as `www.masharikigroup.org` near
the top, again correctly as `masharikigroup.org` further down), so Group
was only matching the `www.` host until caught with:

```bash
grep -n BRAND .env   # any key appearing more than once is a bug
```

Also fill in real `MAIL_*` values if/when live (currently `MAIL_MAILER=log`
is fine).

**Masharket payments run on Pesapal (Rwanda)**, not Flutterwave — see
`README.md` for why. Fill in `PESAPAL_CONSUMER_KEY`/`PESAPAL_CONSUMER_SECRET`
from the Pesapal merchant dashboard, then run this **once per environment**
before any order can be submitted:
```bash
php artisan pesapal:register-ipn
```
This registers `route('market.payments.webhook')` with Pesapal and prints
an `ipn_id` — paste that into `.env` as `PESAPAL_IPN_ID`. Every
`SubmitOrderRequest` call sends this `ipn_id`; without it, Pesapal rejects
the order. Re-run only if the webhook URL itself changes (e.g. a domain
change) — the registration doesn't expire.

After any `.env` edit: `php artisan config:clear` (or `config:cache` in
production once stable) so the app picks it up.

## 4. Point all domains at the app

**On Truehost: nothing to do here** — Parked Domains already share
`~/public_html` automatically (see step 1). This step only applies if your
host gives you real Addon Domains with separate folders; see the "Addon
domain variant" section at the bottom.

## 5. Finish the Laravel setup

```bash
cd ~/public_html
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Create a Filament admin user (only usable at
`https://masharikigroup.org/admin` — see `routes/web.php`, the panel isn't
registered on the other three domain groups):

```bash
php artisan make:filament-user
```

Set permissions so the web server can write to `storage/` and
`bootstrap/cache/`:

```bash
chmod -R 775 storage bootstrap/cache
```

## 6. PHP version + SSL per domain

- **MultiPHP Manager**: confirm PHP **8.2+** for `masharikigroup.org` *and*
  each parked/addon domain individually.
- **SSL/TLS Status** (AutoSSL): issue certificates for all four hostnames.
  On Truehost, AutoSSL (Let's Encrypt) issues **one multi-domain
  certificate** covering all currently-DNS-pointed hostnames as SANs — the
  certificate's displayed **CN may show a different domain** (e.g.
  `*.masharikifestival.org`) than the one you're checking. This is cosmetic
  and does not cause a browser warning; browsers validate against the SAN
  list, not the CN. Verify with the SAN list, not `-subject`:
  ```bash
  echo | openssl s_client -servername <domain> -connect <server-ip>:443 2>/dev/null \
    | openssl x509 -noout -ext subjectAltName
  ```
  A domain whose DNS doesn't point at the server yet will correctly be
  **absent** from the SAN list — AutoSSL's HTTP-01 validation can't
  succeed until DNS resolves here. Rather than waiting for AutoSSL's next
  scheduled run, trigger it immediately once DNS has propagated:
  ```bash
  uapi SSL start_autossl_check
  uapi SSL is_autossl_check_in_progress   # poll until data: 0
  ```
  Confirmed working this way for `masharket.com` — picked up within about
  a minute of triggering, no waiting for the scheduled run.
- **Canonical-host redirects are required, not optional** — confirmed by
  testing: every domain's alternate host form (`www.` for the three
  apex-canonical brands, bare apex for Festival) returned a **404**,
  because `Route::domain()` only matches the exact `BRAND_*_HOST` string,
  with no implicit www/non-www equivalence. Add rewrite rules to
  `public_html/.htaccess`, near the top of the `mod_rewrite` block (before
  the source-file deny rules), one `RewriteCond`/`RewriteRule` pair per
  domain:
  ```apache
  RewriteCond %{HTTP_HOST} ^www\.masharikigroup\.org$ [NC]
  RewriteRule ^ https://masharikigroup.org%{REQUEST_URI} [L,R=301]

  RewriteCond %{HTTP_HOST} ^www\.masharikiacademy\.org$ [NC]
  RewriteRule ^ https://masharikiacademy.org%{REQUEST_URI} [L,R=301]

  RewriteCond %{HTTP_HOST} ^www\.masharket\.com$ [NC]
  RewriteRule ^ https://masharket.com%{REQUEST_URI} [L,R=301]

  RewriteCond %{HTTP_HOST} ^masharikifestival\.org$ [NC]
  RewriteRule ^ https://www.masharikifestival.org%{REQUEST_URI} [L,R=301]
  ```
  Verify with `curl -sk --resolve <host>:443:<ip> https://<host>/ -w
  '%{http_code} -> %{redirect_url}\n'` for every domain's alternate form
  after editing.

## 7. Scheduler (cron)

Add one cron job (cPanel → *Cron Jobs*), running every minute. Confirm the
actual PHP binary path first (`which php` over SSH, after confirming it
resolves to 8.2+ — on Truehost plain `php` already works, no versioned
binary needed):

```
* * * * * php /home/<cpanel-user>/public_html/artisan schedule:run >> /dev/null 2>&1
```

`QUEUE_CONNECTION=database` is currently set, but nothing in this app
actually dispatches queued jobs yet (registration emails and the CSV
export are synchronous — see `README.md`). No queue worker cron is needed
unless that changes.

## 8. DNS cutover

Verify steps 1–7 work by **testing against the server's real IP before
touching DNS** — don't assume the IP from your hosting welcome email is
correct.

> **Server IP gotcha:** Truehost's welcome email lists a "Server IP" used
> for SSH/FTP (`15.235.54.189` in our case) that turned out to be
> **different** from the IP the sites are actually served on
> (`142.44.149.41`). Get the real serving IP per domain from cPanel itself,
> not the email:
> ```bash
> uapi DomainInfo single_domain_data domain=<domain>   # check the `ip` field
> ```

Test with `curl --resolve` against the *real* serving IP (works without
touching your local `/etc/hosts` or waiting for DNS):

```bash
curl -sk --resolve masharikigroup.org:443:142.44.149.41 https://masharikigroup.org/
```

Then, for each domain, at its registrar/DNS provider, point it at the
real serving IP:

- `masharikiacademy.org` — A record → server IP
- `masharket.com` — A record → server IP. **Check for an `MX` record
  pointing at the same apex first** (ours did) — see the mail-decoupling
  note below before changing the website's `A` record.
- `masharikifestival.org` **and** `www.masharikifestival.org` — A/CNAME →
  server IP. Takes the old WordPress site down; this has already happened
  for this project (see the Festival note at the top).

**Mail-decoupling note (applies to any domain whose `MX`/`mail.*` records
point at the website's own apex record):** if a domain's `mail.<domain>`
is a CNAME to `<domain>` itself and its `MX` destination is also
`<domain>`, cutting the apex `A` record over to the new server silently
redirects inbound email too. If email should stay on the old host while
only the website moves:

1. Convert `mail.<domain>` from a CNAME to its own `A` record, pointing at
   the **old** host's IP (unchanged).
2. Repoint the `MX` record's destination from `<domain>` to
   `mail.<domain>`.
3. Only then change the `<domain>` apex `A` record to the new server.

Leave SPF/DKIM/DMARC records untouched in either case — they reference
mail infrastructure independently of the web A record.

DNS propagation can take up to 24–48h depending on TTL.

## 9. Post-deploy verification

Check each domain independently once DNS has propagated:

- `https://masharikigroup.org/` — Group homepage, and `/admin` reachable
- `https://masharikiacademy.org/` — Academy homepage, `/admissions` form
- `https://masharket.com/` — Market homepage, one registration flow
  end-to-end (`/register/students` is the simplest — auto-`paid`)
- `https://www.masharikifestival.org/` — Festival homepage
- Confirm `/admin` does **not** resolve on the academy/market/festival
  domains (per `routes/web.php`, it's only registered in the group route
  group)
- Confirm each domain's AutoSSL cert SAN list actually includes it (see
  step 6) — don't just check for "a valid cert," check it's valid *for
  that domain*.
- Log into `/admin` with a real admin account, not just load the login
  page. A real incident here: login succeeded but every subsequent
  `/admin` request 403'd, for *every* user including a freshly-seeded
  `super-admin` — with zero trace in any log, even a raw `error_log()`
  planted directly inside `User::canAccessPanel()`. Root cause: `User`
  implements the `canAccessPanel()` method but must also declare
  `implements \Filament\Models\Contracts\FilamentUser` — Filament gates
  the call behind an `instanceof` check, and without the interface it
  skips the method entirely and falls back to its own default (deny in
  production). No error, no log, just a silent skip. Confirm with:
  ```bash
  grep -n 'class User' app/Models/User.php   # must show "implements FilamentUser"
  ```

## Rollback

Since all brands share one codebase (whether via Parked Domains, as here,
or via symlinks in the Addon Domain variant), rolling back means
`git checkout <previous-tag>` in `~/public_html` — fast, but affects all
four domains at once; there's no independent per-brand rollback with this
architecture. For the Festival cutover specifically, rolling back means
reverting its DNS record to the old WordPress host.

---

## Addon domain variant (if your host doesn't support Parked Domains the
## way Truehost does)

If domain creation gives you real Addon Domains, each with its own
auto-created folder under `public_html`, you need an explicit symlink step
that Parked Domains skip:

```bash
cd ~
rm -rf public_html          # back up first if it has anything in it
ln -s ~/mashariki-group/public public_html

cd ~/public_html
rm -rf masharikiacademy.org
ln -s ~/mashariki-group/public masharikiacademy.org

rm -rf masharket.com
ln -s ~/mashariki-group/public masharket.com

rm -rf masharikifestival.org
ln -s ~/mashariki-group/public masharikifestival.org
```

This also implies deploying the codebase *outside* the web root (e.g.
`~/mashariki-group`) rather than directly into `public_html`, since each
addon domain's auto-created folder needs replacing rather than sharing one
root. Relies on Apache's `FollowSymLinks` being enabled (cPanel default).
If a domain 404s or serves the wrong content after this, confirm
`FollowSymLinks` with your host, or ask them to set the document root at
the Apache/WHM level instead of via symlink.
