# BlogNest - Laravel Blog Site

Welcome to **BlogNest**, a dynamic blog platform developed to share insights on various topics including AI, Web 3.0, and more. This project was initially based on a YouTube tutorial and has been enhanced with additional features to improve user experience and functionality.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features
- User Authentication (Login/Registration)
- Create, Edit, Delete, and View Blog Posts
- Pagination for blog posts
- Responsive design using Bootstrap
- Dynamic Hero Section
- Navbar and Footer components
- Image upload and display for blog posts
- Additional UI enhancements for better user experience

## Technologies Used
- Laravel (PHP framework)
- Bootstrap (CSS framework)
- MySQL (Database)
- Blade (Laravel's templating engine)

## Installation

### Prerequisites
- PHP 7.4 or higher
- Composer
- Node.js and NPM (for front-end dependencies)
- MySQL

### Steps
1. Clone the repository:
    ```bash
    git clone https://github.com/lahiruanushka/laravel-blog-site.git
    cd laravel-blog-site
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Set up environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your `.env` file with your database credentials.

5. Run database migrations:
    ```bash
    php artisan migrate
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage
- Visit the homepage at `http://localhost:8000`
- Register a new user or login with an existing account.
- Create, edit, or delete blog posts.
- Navigate through the blog posts using pagination.

## Contributing
Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create your feature branch: `git checkout -b feature/YourFeature`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/YourFeature`
5. Open a pull request.
