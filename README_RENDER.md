# Render Deployment

This Laravel project is ready to deploy as a Render Docker Web Service for the public Flutter API.

## Required API Routes

- `GET /api/services`
- `GET /api/services/{id}`
- `GET /api/projects`
- `GET /api/projects/{id}`
- `GET /api/project-categories`
- `GET /api/pricing-categories`
- `GET /api/pricing-packages`
- `GET /api/pricing-packages/{id}`
- `GET /api/contact`
- `POST /api/contact`

## Render Setup

1. Push this backend repository to GitHub.
2. In Render, create a new **Web Service**.
3. Connect the Laravel backend GitHub repository.
4. Select **Docker** as the environment.
5. Keep the default Dockerfile path: `Dockerfile`.
6. Create the service.
7. Add the environment variables below in Render before the first deploy finishes.

Render provides the `PORT` variable automatically. The Docker startup script reads it and configures nginx to serve Laravel from `public/`.

## Environment Variables

Set these in Render:

```env
APP_NAME="Krecht Solutions"
APP_ENV=production
APP_KEY=base64:PASTE_YOUR_REAL_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://my-render-app.onrender.com
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=log
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

Do not commit `.env`. Generate `APP_KEY` locally with:

```bash
php artisan key:generate --show
```

Then paste the shown value into Render as `APP_KEY`.

## MySQL Notes

This project remains on MySQL. Render free web services can connect only to a MySQL server that is reachable from Render over the public internet and allows Render outbound connections.

If Render cannot connect to your current MySQL host, use one of these options:

- Use a managed external MySQL provider and copy its host, database, username, and password into Render.
- Keep MySQL on another VPS/server and allow remote MySQL connections securely.
- Move to PostgreSQL only if you decide to change the database later.

Do not use `127.0.0.1` or `localhost` for `DB_HOST` on Render unless MySQL runs in the same container, which this deployment does not do.

## Local Verification Commands

Run these from the Laravel project root:

```bash
composer install
php artisan config:clear
php artisan route:list
```

Confirm the routes listed above appear with the `api/` prefix.

## Test After Deploy

Open:

```text
https://my-render-app.onrender.com/api/services
```

Expected response type is JSON, not HTML. A valid API response uses this shape:

```json
{
  "success": true,
  "message": "...",
  "data": []
}
```

## Flutter Config

After Render deploys successfully, update only the Flutter app config:

```dart
baseUrl = 'https://my-render-app.onrender.com/api';
siteUrl = 'https://my-render-app.onrender.com';
```
