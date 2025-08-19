# Event Organizer (Laravel)

This project is a web application developed with Laravel to manage and discover events. It allows users to register, create events, view events by category, search for events, register for them, and manage their profile along with the events they have created or are attending. The project follows the MVC pattern and uses Tailwind CSS for frontend design.

## Table of Contents

* [Key Features](#key-features)
* [Technologies Used](#technologies-used)
* [Prerequisites](#prerequisites)
* [Installation](#installation)
* [Usage](#usage)
* [Project Structure and MVC](#project-structure-and-mvc)
* [Database (Models and Relationships)](#database-models-and-relationships)
    * [ERD Design](#erd-design)
    * [Models and Migrations](#models-and-migrations)
    * [Eloquent ORM](#eloquent-orm)
* [Views (Blade and Tailwind CSS)](#views-blade-and-tailwind-css)
* [Forms and Validation](#forms-and-validation)
* [Authentication and Authorization](#authentication-and-authorization)
* [Error Handling](#error-handling)
* [Repository Management (Gitflow)](#repository-management-gitflow)
* [Contributing](#contributing)

## Key Features

* **Full Event Management (CRUD):** Create, Read (details and listings), Update, and Delete events.
* **Category Management:** View events by category.
* **Event Search:** Functionality to search for events.
* **User Management and Authentication:** Registration, login, logout.
* **User Profile Management:** View, edit, update, and delete user profiles.
* **Event Registration:** Authenticated users can register for and unregister from events.
* **User Dashboard:** Profile sections to view created events and events the user is registered for.
* **Event Showcase:** Homepage featuring highlighted sections (free, popular, daytime, evening events).
* **Responsive Design:** Interface adaptable to different screen sizes using Tailwind CSS.

## Technologies Used

* **Backend Framework:** Laravel 11
* **Language:** PHP 8.1
* **Database:** MySQL
* **Frontend:** Blade, Tailwind CSS, Alpine.js
* **Web Server:** Apache
* **Dependency Manager:** Composer
* **Build Tool:** Vite

## Prerequisites

* PHP (version required by your Laravel)
* Composer
* Node.js and NPM (for Vite and frontend dependencies)
* Database Server (the one you chose)
* Git

## Installation

### Local Development

Follow these steps to set up the project in your local environment:

1.  **Clone the repository:**
    ```bash
    git clone [GITHUB_REPOSITORY_URL]
    cd [DIRECTORY_NAME]
    ```
2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
3.  **Copy the environment file:**
    ```bash
    cp .env.example .env
    ```
4.  **Generate the application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Configure the database:** Edit the `.env` file with your database details (name, user, password).
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_db_name
    DB_USERNAME=your_db_user
    DB_PASSWORD=your_db_password
    ```
6.  **Run the migrations:**
    ```bash
    php artisan migrate
    ```
    *(Optional: If you have seeders for initial data)*
    ```bash
    php artisan db:seed
    ```
7.  **Install frontend dependencies:**
    ```bash
    npm install
    ```
8.  **Compile frontend assets:**
    * For development (with hot reload): `npm run dev`
    * For production: `npm run build`
9.  **Create the storage symbolic link:** (If using `storage/app/public` for images)
    ```bash
    php artisan storage:link
    ```

### Production Deployment (Railway)

This project is configured for easy deployment on Railway. Follow these steps:

1. **Push your code to GitHub:**
   ```bash
   git add .
   git commit -m "Configure for Railway deployment"
   git push origin main
   ```

2. **Deploy on Railway:**
   - Go to [Railway.app](https://railway.app)
   - Sign up/Login with your GitHub account
   - Click "New Project" → "Deploy from GitHub repo"
   - Select your repository
   - Railway will automatically detect it's a Laravel project

3. **Add MySQL Database:**
   - In your Railway project, go to "Variables" tab
   - Click "New Variable" → "Reference Variable"
   - Add a MySQL database service
   - Railway will automatically set the database environment variables

4. **Configure Environment Variables:**
   - Copy the variables from `railway.env.example`
   - Update `APP_URL` with your Railway domain
   - Set `APP_ENV=production`
   - Set `APP_DEBUG=false`

5. **Deploy:**
   - Railway will automatically build and deploy your application
   - The post-deploy script will run migrations and setup the database

6. **Access your application:**
   - Your app will be available at `https://your-app-name.railway.app`

## Usage

1.  **Start the development server:**
    ```bash
    php artisan serve
    ```
    *(Note: If using Valet, Herd, Laragon, etc., access via your configured `.test` domain instead)*

2.  **Keep Vite running (if in development):**
    ```bash
    npm run dev
    ```
3.  Open your browser and go to `http://127.0.0.1:8000` (or the URL provided by `php artisan serve`, or your `.test` domain like `http://eventorganizerlaravel.test/`).

## Project Structure and MVC

The project follows Laravel's standard **Model-View-Controller (MVC)** architecture:

* **Models (`app/Models`):** Represent database entities (`Event`, `User`, `Category`). Interact with the database using Eloquent.
* **Views (`resources/views`):** Present the user interface using Blade templates and Tailwind CSS styles. Include layouts, partials, and page-specific views.
* **Controllers (`app/Http/Controllers`):** Handle user requests, interact with models to retrieve/modify data, and load the appropriate views (`HomeController`, `EventController`, `CategoryController`, `ProfileController`, `AuthController`, `RegisterController`).

## Database (Models and Relationships)

### ERD Design

An Entity-Relationship Diagram (ERD) was designed to define the entities, attributes, and relationships for the event management system.

### Models and Migrations

Database migrations (`database/migrations`) were created to define the table structure corresponding to the models:

* `User`: Stores registered user information.
* `Category`: Defines event categories.
* `Event`: Stores details for each event, including relationships with `User` (creator) and `Category`.
* `event_users` (Pivot Table): Manages the many-to-many relationship between `Event` and `User` (attendees), including the number of guests (`guests_count`).

### Eloquent ORM

Laravel's Eloquent ORM is used for object-oriented database interaction, defining relationships (`belongsTo`, `belongsToMany`) within the models.

## Views (Blade and Tailwind CSS)

The user interface is built with:

* **Blade:** Laravel's templating engine for creating dynamic views. Utilizes layouts (`layouts/`), partials (`partials/` or `components/`) for code reuse (e.g., `event_card`).
* **Tailwind CSS:** A utility-first CSS framework for rapid, custom UI development. Responsive design is implemented to adapt to different devices.
* **Alpine.js:** Used to add light frontend interactivity (e.g., dropdown menus).

## Forms and Validation

* Forms have been created for registration, login, event creation/editing, and profile editing.
* Data validation is implemented on both the client-side (HTML5, potentially JS) and server-side (using Laravel Form Requests or controller validation) to ensure data integrity.

## Authentication and Authorization

* **Authentication:** Laravel's built-in authentication system (likely Fortify/Sanctum or Breeze/Jetstream/UI) is used to manage user registration, login, and logout, as evidenced by the routes grouped by `middleware('guest')` and `middleware('auth')`.
* **Authorization:** Authorization mechanisms are implemented (or planned) to control actions authenticated users can perform. For example, using Laravel Gates or Policies to allow only the event creator to edit or delete their event, or only the user themselves to edit/delete their profile.
    *(Optional: Mention if Roles/Permissions are used, e.g., with Spatie Laravel Permissions)*

## Error Handling

Laravel provides robust error handling. Custom error pages (e.g., 404, 500) can be created in `resources/views/errors`.

## Repository Management (Gitflow)

Development follows (or should follow) a Gitflow-based workflow using a GitHub repository:

* `main` (production) and `develop` branches.
* `feature/` branches for new functionalities.
* Use of Pull Requests for reviewing and merging code into `develop`.
* `release/` and `hotfix/` branches as needed.

## Contributing

Contributions are welcome. Please follow the Gitflow workflow, create a Pull Request from your feature branch to `develop`, and describe your changes.
