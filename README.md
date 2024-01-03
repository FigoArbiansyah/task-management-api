# Task Management API

## Overview

REST API for manage personal tasks.

## Getting Started

1. Run the setup script to automate the installation process:

```bash
# Clone the repository
git clone https://github.com/FigoArbiansyah/task-management-api.git

# Navigate to the project directory
cd task-management-api

# Install PHP dependencies
composer update

# Copy environment variables
cp .env.example .env

# Generate application key
php artisan key:generate

# Generate jwt secret key
php artisan jwt:secret

# Run database migrations
php artisan migrate

# Start the development server
php artisan serve
```
