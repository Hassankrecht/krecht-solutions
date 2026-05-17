# Krecht Solutions

A Laravel 10 company website with a full admin dashboard for managing content (Projects, Pricing Packages, Testimonials, FAQs, Contact Messages, and Services).

---

## Tech Stack

- **Backend:** PHP 8.1+, Laravel 10
- **Frontend:** Blade templates, Bootstrap 5, Tabler Icons
- **Database:** MySQL
- **Auth:** Laravel Breeze

---

## Features

- Public frontend: Home, About, Services, Portfolio, Pricing, Contact
- Admin dashboard protected by auth
- Full CRUD for: Services, Projects, Pricing Packages, Testimonials, FAQs
- Contact form saves messages to database (viewable in admin inbox)
- Site settings managed via database
- Database seeders for all content sections

---

## Local Setup

### 1. Clone the repository

```bash
git clone https://github.com/Hassankrecht/krecht-solutions.git
cd krecht-solutions
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```env
DB_DATABASE=krecht_solutions
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Run migrations and seed data

```bash
php artisan migrate
php artisan db:seed
```

### 5. Build frontend assets

```bash
npm run dev
```

### 6. Serve the application

```bash
php artisan serve
```

Visit `http://localhost:8000`

---

## Admin Access

Navigate to `/admin/login` and log in with your credentials.  
To create an admin user:

```bash
php artisan tinker
>>> \App\Models\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('password')]);
```

---

## Key Routes

| URL | Description |
|-----|-------------|
| `/` | Homepage |
| `/about` | About page |
| `/services` | Services page |
| `/portfolio` | Portfolio / Projects |
| `/pricing` | Pricing page |
| `/contact` | Contact form |
| `/admin` | Admin dashboard |
| `/admin/projects` | Manage projects |
| `/admin/pricing-packages` | Manage pricing |
| `/admin/testimonials` | Manage testimonials |
| `/admin/faqs` | Manage FAQs |
| `/admin/contact-messages` | View contact messages |
| `/admin/services` | Manage services |

---

## Useful Commands

```bash
php artisan route:list          # List all routes
php artisan migrate:fresh --seed  # Reset DB and re-seed
php artisan optimize:clear      # Clear all caches
php artisan db:seed             # Re-seed without resetting
```

---

## License

MIT
