<div align="center">

# Krecht Solutions

**A professional Laravel 10 company website with a comprehensive admin dashboard for managing business content**

[![Laravel](https://img.shields.io/badge/Laravel-10.50.2-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1.10-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

</div>

---

## 📋 Overview

Krecht Solutions is a full-stack web application built with Laravel 10, featuring a modern public-facing website and a powerful admin dashboard. The platform enables businesses to showcase their services, portfolio projects, pricing packages, and manage client inquiries through an intuitive content management system.

### Key Highlights

- 🌐 **Multi-language Support** - English and Arabic with RTL support
- 🎨 **Modern UI/UX** - Built with Bootstrap 5 and TailwindCSS
- 📊 **Comprehensive Admin Dashboard** - Full content management capabilities
- 🔒 **Secure Authentication** - Protected admin area with role-based access
- 📱 **Responsive Design** - Optimized for all devices
- 🚀 **Performance Optimized** - Efficient asset compilation and caching

---

## ✨ Features

### Public Website

- **Homepage** - Dynamic hero section, service highlights, portfolio showcase
- **About Page** - Company information and team presentation
- **Services Page** - Detailed service offerings with descriptions
- **Portfolio Page** - Project gallery with category filtering
- **Pricing Page** - Transparent pricing packages with features
- **Contact Page** - Contact form with message handling

### Admin Dashboard

- **Dashboard Overview** - Statistics and analytics at a glance
- **Projects Management** - Full CRUD with image/video galleries
- **Services Management** - Service content and descriptions
- **Pricing Packages** - Tiered pricing with feature lists
- **Testimonials** - Client reviews with image support
- **FAQ Management** - Question and answer content
- **Contact Messages** - Message inbox with read status
- **Site Settings** - Global configuration management
- **Visitor Tracking** - Analytics and visitor statistics

### Technical Features

- Multi-language content (English/Arabic)
- Image and video upload management
- Category-based project organization
- SEO-friendly URL structure
- Database seeders for quick setup
- Form validation and error handling
- Secure file storage with symbolic links

---

## 🛠 Tech Stack

| Component | Technology | Version |
|-----------|-----------|---------|
| **Backend Framework** | Laravel | 10.50.2 |
| **Programming Language** | PHP | 8.1.10 |
| **Database** | MySQL | 8.0+ |
| **Frontend Framework** | Blade Templates | - |
| **CSS Framework** | Bootstrap 5 | 5.3+ |
| **CSS Utility** | TailwindCSS | 3.x |
| **JavaScript Runtime** | Vite | - |
| **Authentication** | Laravel Breeze | - |
| **Icons** | Tabler Icons | - |
| **Package Manager** | Composer / NPM | - |

---

## 📦 Installation

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL >= 8.0
- Git

### Step 1: Clone the Repository

```bash
git clone https://github.com/Hassankrecht/krecht-solutions.git
cd krecht-solutions
```

### Step 2: Install Dependencies

```bash
composer install
npm install
```

### Step 3: Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Configure your `.env` file with your database credentials:

```env
APP_NAME="Krecht Solutions"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=krecht_solutions
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 4: Database Setup

```bash
php artisan migrate
php artisan db:seed
```

### Step 5: Create Storage Link

```bash
php artisan storage:link
```

### Step 6: Build Frontend Assets

```bash
npm run dev
```

For production:

```bash
npm run build
```

### Step 7: Start the Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

## 👤 Admin Access

### Default Admin User

The database seeder creates a default admin user:

- **Email:** admin@example.com
- **Password:** password

⚠️ **Important:** Change the default admin credentials in production.

### Creating a New Admin User

```bash
php artisan tinker
>>> \App\Models\User::create([
...     'name' => 'Admin Name',
...     'email' => 'admin@example.com',
...     'password' => bcrypt('your_secure_password'),
...     'is_admin' => true
... ]);
```

### Admin Dashboard URL

Navigate to `/admin/login` to access the admin panel.

---

## 📁 Project Structure

```
krecht-solutions/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   └── Auth/           # Authentication controllers
│   │   └── Middleware/         # Custom middleware
│   ├── Models/                 # Eloquent models
│   └── Mail/                   # Email notifications
├── config/                     # Application configuration
├── database/
│   ├── migrations/             # Database migrations
│   ├── seeders/                # Database seeders
│   └── factories/              # Model factories
├── public/
│   └── assets/                 # Public assets (images, videos)
├── resources/
│   ├── css/                    # CSS files
│   ├── js/                     # JavaScript files
│   └── views/                  # Blade templates
│       ├── admin/              # Admin views
│       ├── auth/               # Authentication views
│       ├── components/         # Reusable components
│       └── layouts/            # Layout templates
├── routes/
│   ├── admin.php               # Admin routes
│   ├── api.php                 # API routes
│   ├── auth.php                # Auth routes
│   └── web.php                 # Public web routes
└── tests/                      # Test files
```

---

## 🚀 Key Routes

### Public Routes

| Route | Description |
|-------|-------------|
| `/` | Homepage |
| `/about` | About Us |
| `/services` | Services |
| `/portfolio` | Portfolio / Projects |
| `/pricing` | Pricing Packages |
| `/contact` | Contact Form |

### Admin Routes

| Route | Description |
|-------|-------------|
| `/admin/login` | Admin Login |
| `/admin/dashboard` | Dashboard Overview |
| `/admin/projects` | Manage Projects |
| `/admin/services` | Manage Services |
| `/admin/pricing-packages` | Manage Pricing |
| `/admin/testimonials` | Manage Testimonials |
| `/admin/faqs` | Manage FAQs |
| `/admin/contact-messages` | Contact Messages |
| `/admin/settings` | Site Settings |
| `/admin/visitors` | Visitor Analytics |

---

## 🔧 Useful Commands

```bash
# Database operations
php artisan migrate              # Run migrations
php artisan migrate:fresh --seed # Reset and re-seed database
php artisan db:seed             # Run seeders
php artisan migrate:rollback    # Rollback last migration

# Cache operations
php artisan optimize:clear      # Clear all caches
php artisan config:cache        # Cache configuration
php artisan route:cache         # Cache routes
php artisan view:cache          # Cache views

# Development
php artisan serve              # Start development server
npm run dev                    # Start Vite dev server
npm run build                  # Build for production

# Debugging
php artisan route:list         # List all routes
php artisan tinker             # Interact with application
php artisan migrate:status     # Check migration status
```

---

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

Run specific test:

```bash
php artisan test --filter TestName
```

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Coding Standards

- Follow PSR-12 coding standards
- Write meaningful commit messages
- Add tests for new features
- Update documentation as needed

---

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Author

**Krecht Solutions**

- GitHub: [@Hassankrecht](https://github.com/Hassankrecht)

---

## 🙏 Acknowledgments

- Laravel Framework and community
- Bootstrap for UI components
- Tabler Icons for iconography
- All contributors and supporters

---

<div align="center">

**Built with ❤️ using Laravel**

</div>
