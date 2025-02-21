# Royal App

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
   ```
1. Install dependencies:
   ```sh
   composer install
   ```
2. Configure the `.env` file:
   ```sh
   cp .env.example .env
   ```
   Update database credentials and API base URL.
3. Generate the application key:
   ```sh
   php artisan key:generate
   ```
4. Start the development server:
   ```sh
   php artisan serve
   ```
## License

This project is licensed under the MIT License.

