## PHP Technical Task

This is a test technical project built with PHP Laravel framework.

## Project Setup

To set up the project, follow the steps below:

```bash
# Step 1: Install dependencies using Composer
composer install

# Step 2: Generate an application key and create the .env configuration file by .env.example
php artisan key:generate

# Step 3: Run the database migrations
php artisan migrate

# Step 4: Install front-end dependencies using npm
npm install

# Step 5: Compile Tailwind CSS
npm run dev

# Step 6: Start the development server
php artisan serve
