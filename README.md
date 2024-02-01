# Laravel Company Organization Project

This is a Laravel project for managing company organization structures, employees, and related entities.

## Installation

### Prerequisites

- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [PHP](https://www.php.net/)

### Steps

1. **Clone the repository:**

    ```bash
    git clone repo_url
    ```

2. **Install Composer Dependencies:**

    ```bash
    composer install
    ```

3. **Install NPM Dependencies:**

    ```bash
    npm install
    ```

4. **Copy env:**

    ```bash
    cp .env.example .env
    ```

5. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

6. **Seed the Database (Optional):**

    ```bash
    php artisan db:seed
    ```

7. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    Your application will be accessible at [http://localhost:8000](http://localhost:8000).

8. **Compile Assets:**

    ```bash
    npm run dev
    ```

    For production, use `npm run production`.
