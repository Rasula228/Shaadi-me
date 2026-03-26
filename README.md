# ShaadiMe

This repository is organized around two applications:

- `backend/`: Laravel PHP backend
- `frontend/`: Angular web app

## Structure

- `backend/app/`: Laravel controllers and models
- `backend/routes/`: Laravel API route definitions
- `backend/database/migrations/`: database schema migrations
- `frontend/src/app/pages/`: route-level Angular pages
- `frontend/src/app/components/`: shared Angular UI components
- `frontend/src/app/services/`: Angular API services

## Run The Angular App

From the Angular app directory:

```bash
cd frontend
npm install
npm run start -- --port 3000 --host 0.0.0.0 --proxy-config proxy.conf.json
```

Open `http://localhost:3000`.

## Run The Laravel Backend

The Angular proxy is configured to forward `/api` requests to `http://localhost:8000`, which is the default Laravel dev server port.

Once the Laravel backend is fully bootstrapped, the typical startup command will be:

```bash
cd backend
php artisan serve --host=0.0.0.0 --port=8000
```

At the moment, `backend/` contains Laravel-style application code, but the full Laravel project scaffold is not present yet.
