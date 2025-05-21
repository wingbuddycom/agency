# Wingbuddy Agency Portal

This repository hosts a small Laravel application for Wingbuddy agents. It provides authentication, a commission dashboard and related features. The project uses Laravel 12, Vite and Bootstrap for its front‑end assets.

## Requirements

- PHP 8.2+ with Composer
- Node.js 20+
- Docker & Docker Compose (for containerised development)

## Getting Started

1. Clone the repository and install PHP dependencies:
   ```bash
   composer install
   ```
2. Install Node dependencies:
   ```bash
   npm ci
   ```
3. Copy the example environment file and fill in the variables:
   ```bash
   cp .env.example .env
   ```
   At minimum you will need database credentials, `RECAPTCHA_SITE_KEY`, `GOOGLE_CLOUD_PROJECT` and `GOOGLE_CLOUD_SQL_CONNECTION_NAME` when using the provided Docker Compose setup.
4. Generate an application key if it has not been created yet:
   ```bash
   php artisan key:generate
   ```
5. Run the database migrations:
   ```bash
   php artisan migrate
   ```

## Local Development

### Using Docker

Build and start the containers:
```bash
docker compose build --no-cache app
docker compose up -d
```
The application will be available at [http://localhost:8080/en/login](http://localhost:8080/en/login).

### Using the Composer script

For a non‑container workflow you can run all development services with:
```bash
composer run dev
```
This script starts the Laravel development server, queue worker, log viewer (Pail) and Vite in watch mode.

## Running Tests

Execute the test suite with:
```bash
composer test
```

## Deployment

A Cloud Build configuration (`cloudbuild.yaml`) and GitHub Actions workflow (`.github/workflows/deploy-dev.yaml`) are provided to build and deploy the container to Google Cloud Run.

