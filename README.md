# Laravel API Assignment

## Overview

This Laravel project is an API-driven application that allows users to manage authors and books. The system includes authentication, profile management, and CRUD operations for authors and books using an external API.

## Features

- User authentication with session management
- Profile page displaying user details
- List, create, view, and delete authors
- List, create, view, and delete books
- Validation for book creation
- Middleware for authentication and session expiration handling
- Global error and success message handling

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/your-repo/laravel-api-assignment.git
   cd laravel-api-assignment
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Configure the `.env` file:
   ```sh
   cp .env.example .env
   ```
   Update database credentials and API base URL.
4. Generate the application key:
   ```sh
   php artisan key:generate
   ```
6. Start the development server:
   ```sh
   php artisan serve
   ```
## License

This project is licensed under the MIT License.

