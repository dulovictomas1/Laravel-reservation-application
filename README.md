# Booking Portal CMS + PWA

Laravel-based booking portal and mini CMS system for service providers and Procedural web aplication.

## Features

- User registration and authentication (Laravel Breeze)
- Role system (`admin` / `user`)
- Public service listing
- Booking system with dynamic availability
- Booking by public token URL
- Admin panel
- Client profile management
- CMS pages with custom slugs
- Homepage selection via database (`is_home`)
- Booking date validation
- Dynamic free time calculation
- Flatpickr calendar integration
- PWA functionality

---

## Tech Stack

- Laravel
- PHP 8+
- MySQL
- Blade
- TailwindCSS
- Flatpickr

---

## Main Functionality

### Public Frontend

Users can:

- browse published services
- filter services
- open public booking pages
- check available dates and times
- create reservations
- download web aplication to homescreen (PWA)

### Client Area

Authenticated users can:

- manage profile details
- set available booking times
- publish/unpublish profile

### Admin Area

Admin can:

- manage clients
- approve/publish services
- manage CMS pages
- create dynamic pages with slugs
- set homepage page

---

## Database Structure

Main tables:

```text
users
user_details
bookings
posts
tags
```

## Installation

```bash
git clone <repo-url>
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
```
---

## Project Goal

Original booking system was previously written in raw PHP and connected to WordPress.

This project is a full Laravel rewrite focused on:

* MVC architecture
* scalability
* cleaner backend structure
* reusable CMS components
* public booking portal system