# User Management System with Laravel Sail

A complete user management system with:
- User registration and authentication
- Admin and regular user roles
- Profile management
- Secure password handling

## Features

### User Features
- Register with username, email, and password
- Login/logout functionality
- View and edit personal profile
- Change password with current password verification

### Admin Features
- View all users with pagination
- View detailed user information
- Edit user emails
- Toggle admin privileges (except for self)
- Protected admin-only routes

## Prerequisites

- Docker
- Docker Compose
- PHP 8.1+
- Composer

## Installation

1. Clone the repository:
```bash
   git clone https://github.com/diaahere89/test-de-agostini
   cd user-management
```

2. Install dependencies:
```bash
    ./vendor/bin/sail composer install
    ./vendor/bin/sail npm install
```

3. Configure environment:
```bash
    cp .env.example .env
    ./vendor/bin/sail artisan key:generate
```

4. Start the containers:
```bash
    ./vendor/bin/sail up -d
```

5. Run migrations:
```bash
    ./vendor/bin/sail artisan migrate
```

6. Compile Assets:
```bash
    ./vendor/bin/sail npm run dev
```


## Usage
1. Accessing the Application:
- Register a new user account or log in with existing credentials.
- If you have admin privileges, access the admin dashboard from the navigation menu.
- Manage your profile and change your password from your user settings.
- Application URL: `http://localhost`.
- Login page: `/login`.
- Registration page: `/register`.
- User profile: `/profile`.

2. Admin access:
- First, register a regular user.
- Then make the user an admin via command line: `./vendor/bin/sail artisan user:make-admin user@example.com`.

3. Blade Template Structure:
resources/views/
├── layouts/
│   ├── app.blade.php      # Main layout (uses @yield('content'))
│   └── navigation.blade.php
├── auth/                  # Authentication views
├── profile/               # User profile views
│   ├── show.blade.php
│   ├── edit.blade.php
│   └── change-password.blade.php
└── users/                 # User management views
    ├── index.blade.php
    ├── show.blade.php
    └── edit.blade.php

4. Seeding the Database:
- To populate the database with sample users and data, run:
```bash
    ./vendor/bin/sail artisan db:seed
```
- You can customize the seeders in `database/seeders/` as needed.