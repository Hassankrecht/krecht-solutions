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

DB_CONNECTION=sqlite

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

## SQLite Notes

This project uses SQLite for Render deployment. The SQLite database file is stored at `database/database.sqlite` and is created automatically during deployment.

Advantages of SQLite for Render:
- No external database service required
- No database connection configuration needed
- Database file persists in the application storage
- Zero additional cost for database hosting

The database is automatically migrated and seeded during the first deployment using existing migration and seeder files.

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
