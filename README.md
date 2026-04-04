# ShaadiMe - Wedding Planning Application

A full-stack wedding planning platform built with **Angular 21** frontend and **Laravel 10** backend.

## Repository Structure

```
ShaadiMe/
├── backend/          # Laravel 10 PHP backend
├── frontend/         # Angular 21 web application
├── CHANGES.md        # Detailed changelog
└── README.md         # This file
```

---

## Backend (Laravel 10)

### Modular Architecture

The backend follows a modular structure under `backend/app/Modules/`:

| Module | Description |
|--------|-------------|
| `Contact/` | Contact form submissions and inquiries |
| `Lead/` | Lead capture and management |
| `Venue/` | Venue listings and types |
| `Home/` | Homepage content and configuration |
| `AboutUs/` | About page content |
| `Destinations/` | Wedding destination locations |
| `Press/` | Press and media content |
| `Weddings/` | Wedding planning and management |

Each module contains:
- `Controllers/` - HTTP request handlers
- `Models/` - Database models
- `Requests/` - Form request validation
- `Services/` - Business logic
- `Routes/` - Module-specific API routes

### Module Route Loader

All module routes are automatically loaded via `backend/app/Modules/Routes.php`, which scans each module's `Routes/` folder for route files.

### Laravel 10 Compatibility

- `bootstrap/app.php` - Converted from Laravel 11 to Laravel 10 format
- `app/Http/Kernel.php` - HTTP kernel with middleware groups
- `app/Console/Kernel.php` - Console kernel for artisan commands
- `app/Exceptions/Handler.php` - Exception handler
- `app/Providers/RouteServiceProvider.php` - Route service provider

### API Endpoints

#### Contact Routes
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/contacts` | Create contact |
| GET | `/api/contacts` | List all contacts |
| GET | `/api/contacts/{id}` | Get contact by ID |
| PUT | `/api/contacts/{id}` | Update contact |
| DELETE | `/api/contacts/{id}` | Delete contact |
| GET | `/api/contacts/check/{id}` | Check contact list |

#### Lead Routes
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/leads` | Create lead |
| GET | `/api/leads` | List all leads |
| GET | `/api/leads/{id}` | Get lead by ID |
| DELETE | `/api/leads/{id}` | Delete lead |

#### Venue Routes
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/venues` | List all venues |
| GET | `/api/venues/{id}` | Get venue by ID |
| GET | `/api/venues/types` | Get venue types |

#### Wedding Routes
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/weddings` | Create wedding lead |
| GET | `/api/weddings` | List all weddings |
| GET | `/api/weddings/{id}` | Get wedding by ID |
| PUT | `/api/weddings/{id}` | Update wedding |
| DELETE | `/api/weddings/{id}` | Delete wedding |

---

## Frontend (Angular 21)

### Architecture

The frontend uses **NgModule-based architecture** with centralized declarations in `AppModule`:

```
frontend/src/app/
├── app.module.ts              # Root module (all declarations here)
├── app-routing.module.ts      # Route definitions
├── app.ts                     # Root component
├── main.ts                    # Application entry point
├── pages/                     # Route-level page components
│   ├── home/
│   ├── about/
│   ├── contact/
│   ├── venues/
│   ├── weddings/
│   ├── services/
│   ├── destinations/
│   ├── press/
│   └── plan/
├── components/                # Shared UI components
│   ├── navbar/
│   ├── footer/
│   ├── intake-form/
│   ├── components.module.ts   # Empty (declarations moved to AppModule)
│   └── landing-page/
│       ├── hero/
│       ├── cities/
│       ├── decor/
│       ├── themes/
│       ├── venues/
│       ├── faq/
│       └── why/
├── layouts/
│   └── main-layout/
└── services/
    ├── lead.service.ts
    ├── contact.service.ts
    └── venue.service.ts
```

### Key Changes Made

1. **Module Conflict Resolution** - Removed duplicate declarations from `PagesModule` and `ComponentsModule`, consolidated all in `AppModule`
2. **Contact Service Integration** - Connected contact form to backend API via `ContactService`
3. **Home Page Enhancement** - Added destinations array, FAQ toggle, form modal, and all landing page sections
4. **PrimeNG Integration** - Added `CardModule`, `DividerModule` imports where needed
5. **CommonModule Imports** - Added to all components using `*ngFor`/`*ngIf` directives
6. **FormsModule** - Added to intake-form component for `ngModel` support

### Pages

| Page | Route | Description |
|------|-------|-------------|
| Home | `/` | Landing page with hero, cities, decor, themes, venues, FAQ |
| About | `/about` | About ShaadiMe |
| Contact | `/contact` | Contact form with API integration |
| Venues | `/venues` | Venue listings |
| Weddings | `/weddings` | Wedding planning |
| Services | `/services` | Our services |
| Destinations | `/destinations` | Wedding destinations |
| Press | `/press` | Press and media |
| Plan | `/plan` | Wedding planning intake form |

---

## Setup & Run

### Prerequisites

- Node.js (v24+)
- PHP 8.1+
- Composer

### Frontend Setup

```bash
cd frontend
npm install --legacy-peer-deps
npm run start -- --port 3000 --host 127.0.0.1 --proxy-config proxy.conf.json
```

Open `http://localhost:3000`.

### Backend Setup

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve --host=127.0.0.1 --port=8000
```

The Angular proxy forwards `/api` requests to `http://localhost:8000`.

### Run Both Together

```bash
./run-dev.sh
```

Override ports if needed:

```bash
BACKEND_PORT=8001 FRONTEND_PORT=3001 ./run-dev.sh
```

---

## Branch Structure

All code has been consolidated into the `main` branch. Other branches (`Priyanshu`, `Rasul`) contain work-in-progress changes.

---

## Detailed Changelog

See [CHANGES.md](./CHANGES.md) for a complete list of all changes made.
