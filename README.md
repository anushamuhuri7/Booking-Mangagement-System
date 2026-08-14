# 📅 Booking Management System

A full-featured **Booking Management System** built with **Laravel 12** and **PHP 8.2**. The application supports two user roles — **Admin** and **User** — each with their own dashboard for managing bookings, user profiles, and dynamic web pages.

---

## ✨ Features

### 🔐 Authentication
- User registration and login
- Session-based authentication with Laravel middleware
- Secure logout

### 👤 User Role
- View personal dashboard
- Create and manage their own bookings
- View and cancel their bookings
- Update profile (name, phone number, profile image)

### 🛠️ Admin Role
- Access a dedicated admin dashboard
- View and manage **all bookings** across all users (create, edit, delete)
- Manage **all users** (create, edit, delete)
- Manage **dynamic web pages** (create, edit, publish/unpublish)
- Update admin profile

### 📋 Booking Management
- Create bookings with name, date/time, and status
- Booking statuses: **Booked**, **Cancelled**, **Fulfilled**
- Edit and delete existing bookings

### 🌐 Dynamic Web Pages
- Admin can create custom HTML web pages with a URL slug
- Pages can be set to **Active** or **Inactive**
- Pages are publicly accessible via `/page/{slug}`

---

## 🛠️ Tech Stack

| Layer        | Technology             |
|--------------|------------------------|
| Framework    | Laravel 12             |
| Language     | PHP 8.2+               |
| Database     | MySQL (via XAMPP)      |
| Frontend     | Blade Templates        |
| Build Tool   | Vite                   |
| Auth         | Laravel Session Auth   |
| Testing      | PHPUnit 11             |

---

## 📁 Project Structure

```
bookingms/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php       # Login, register, logout
│   │   ├── BookingController.php    # CRUD for bookings
│   │   ├── UserController.php       # User & admin management, profiles
│   │   └── WebpageController.php    # Dynamic page management
│   └── Models/
│       ├── Bookings.php
│       ├── User.php
│       └── WebPage.php
├── database/migrations/             # All DB schema migrations
├── resources/views/
│   ├── AdminDashboard/              # Admin views (Bookings, Users, Pages)
│   ├── UserDashboard/               # User views (Bookings, Profile)
│   ├── Auth/                        # Login & Register views
│   └── Layout/                      # Shared base layouts
├── routes/web.php                   # All application routes
└── public/assets/images/            # Static assets
```

---

## 🚀 Getting Started

### Prerequisites

- [PHP 8.2+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js & npm](https://nodejs.org/)
- [XAMPP](https://www.apachefriends.org/) (or any MySQL server)

### Installation

**1. Clone the repository**
```bash
git clone https://github.com/anushamuhuri7/Booking-Mangagement-System.git
cd Booking-Mangagement-System
```

**2. Install PHP dependencies**
```bash
composer install
```

**3. Install Node dependencies**
```bash
npm install
```

**4. Set up environment**
```bash
cp .env.example .env
php artisan key:generate
```

**5. Configure your database**

Open `.env` and update the database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookingms
DB_USERNAME=root
DB_PASSWORD=
```

**6. Run migrations**
```bash
php artisan migrate
```

**7. Build frontend assets**
```bash
npm run build
```

**8. Start the development server**
```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

> **Tip:** You can also use `composer run dev` to run the Laravel server, queue listener, and Vite dev server all at once.

---

## 🗺️ Routes Overview

| Method | URL                   | Description                          | Access      |
|--------|-----------------------|--------------------------------------|-------------|
| GET    | `/`                   | Landing / homepage                   | Public      |
| GET    | `/page/{name}`        | View a dynamic web page              | Public      |
| GET    | `/login`              | Login page                           | Guest       |
| POST   | `/login`              | Authenticate user                    | Guest       |
| GET    | `/signup`             | Registration page                    | Guest       |
| POST   | `/signup`             | Create new user account              | Guest       |
| GET    | `/logout`             | Logout current user                  | Auth        |
| GET    | `/dashboard/admin`    | Admin dashboard                      | Auth        |
| GET    | `/dashboard/user`     | User dashboard                       | Auth        |
| GET    | `/booking/all`        | View all bookings (admin)            | Auth        |
| GET    | `/booking/my`         | View my bookings (user)              | Auth        |
| GET    | `/booking/add`        | Add a new booking                    | Auth        |
| POST   | `/booking/save`       | Save new booking                     | Auth        |
| GET    | `/booking/{id}`       | Edit a booking                       | Auth        |
| POST   | `/booking/{id}`       | Update a booking                     | Auth        |
| GET    | `/booking/delete/{id}`| Confirm delete booking               | Auth        |
| POST   | `/booking/delete/{id}`| Delete a booking                     | Auth        |
| GET    | `/user/all`           | List all users (admin)               | Auth        |
| GET    | `/user/profile`       | View/edit own profile                | Auth        |
| GET    | `/webpage/my`         | List web pages (admin)               | Auth        |

---

## 🗄️ Database Schema

### `users`
| Column         | Type     | Description                      |
|----------------|----------|----------------------------------|
| id             | bigint   | Primary key                      |
| name           | string   | User's full name                 |
| email          | string   | Unique email address             |
| password       | string   | Hashed password                  |
| phone_no       | string   | Phone number                     |
| user_type      | smallint | `1` = Admin, `2` = User          |
| profile_image  | string   | Profile picture path             |

### `bookings`
| Column           | Type     | Description                                          |
|------------------|----------|------------------------------------------------------|
| id               | bigint   | Primary key                                          |
| name             | string   | Booking name/title                                   |
| booking_datetime | string   | Date and time of booking                             |
| status           | smallint | `1` = Booked, `2` = Cancelled, `3` = Fulfilled      |
| user_id          | integer  | Foreign key to users                                 |

### `web_page`
| Column     | Type     | Description                        |
|------------|----------|------------------------------------|
| id         | bigint   | Primary key                        |
| name       | string   | Page title                         |
| slug       | string   | URL-friendly identifier            |
| html       | text     | Page HTML content                  |
| status     | smallint | `1` = Active, `0` = Inactive       |
| created_by | bigint   | User ID of creator                 |
| updated_by | bigint   | User ID of last editor             |

---

## 🧪 Running Tests

```bash
composer run test
```

Or using PHPUnit directly:
```bash
php artisan test
```

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
