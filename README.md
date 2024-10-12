# Laravel Tournament Registration System

## Overview

This Laravel application was developed for the Internet Technologies course, which is part of the Bachelor's degree program. The project aims to effectively demonstrate the concepts of Laravel by managing tournament registrations. It focuses on key entities such as **users**, **registrations**, and **tournaments**, all of which are stored in a MySQL database.

## Features

-   **User Authentication**: Securely register and log in users.
-   **Tournament Management**: Administer tournament details.
-   **Registration Management**: Users can register for specific tournaments and view their registrations.

## Technologies Used

-   **PHP**: Server-side scripting language.
-   **Laravel**: PHP framework for web applications.
-   **MySQL**: Relational database management system.
-   **Composer**: Dependency management tool for PHP.

## Installation

To set up this project locally, follow these steps:

1. Clone the Repository

    Use Git to clone the repository:

    ```bash
    git clone https://github.com/Filipovic13/iteh2-Laravel
    cd iteh2-Laravel
    ```

2. Install Dependencies

    Ensure you have Composer installed, then run:

    ```
    composer install
    ```

3. Set Up Environment File

    Create a .env file in the root of your project to set up your environment variables manually. This file contains sensitive information, such as database credentials, that should not be included in version control.

    #### For Windows Users:

    - Navigate to the Project Directory
    - Click on the address bar at the top of the File Explorer window. This is where the path of the current directory is displayed.
    - Once the address bar is active (you can see a blinking cursor), simply type `cmd` and press `Enter`.This will open the Command Prompt directly in that directory.
    - in the project directory and run next command to create file called .env:

    ```
    echo. > .env
    ```

    Then, open the .env file in a text editor and add your configuration:

    ```
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:AJOXEzbJW2e1ld4s1pQBwZE4nnmLm7n23td1VMCoCvI=  # Generate a new key if necessary
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1  # Database host
    DB_PORT=3306       # Database port
    DB_DATABASE=your_database_name  # Change to your database name
    DB_USERNAME=your_database_username  # Change to your database username
    DB_PASSWORD=your_database_password  # Change to your database password

    MAIL_MAILER=smtp
    MAIL_HOST=mailhog  # Change to your mail host if not using MailHog
    MAIL_PORT=1025     # Change to your mail port if not using MailHog
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"  # Change to your desired sender email
    MAIL_FROM_NAME="${APP_NAME}"

    # Uncomment and fill these if using AWS services
    # AWS_ACCESS_KEY_ID=
    # AWS_SECRET_ACCESS_KEY=
    # AWS_DEFAULT_REGION=us-east-1
    # AWS_BUCKET=
    # AWS_USE_PATH_STYLE_ENDPOINT=false

    # Uncomment and fill these if using Pusher for real-time features
    # PUSHER_APP_ID=
    # PUSHER_APP_KEY=
    # PUSHER_APP_SECRET=
    # PUSHER_HOST=
    # PUSHER_PORT=443
    # PUSHER_SCHEME=https
    # PUSHER_APP_CLUSTER=mt1

    ```

    4. Run Migrations

    To set up the database structure, run:

    ```
    php artisan migrate
    ```

    5. Run the Development Server

    Finally, start the server with:

    ```
    php artisan serve
    ```

    You can now access your application at `http://localhost:8000`.

## Code Structure

### Configuration

-   **`app/Http/Config/auth.php`**: Contains authentication defaults, guards, and user providers for the application.

### Migrations

-   **`app/Http/Migrations`**: Contains migration files that define the structure of the database.
    -   **Users Table**: Defines users with fields for name, surname, email, country, city, and club.
    -   **Registrations Table**: Stores tournament registration data.
    -   **Tournaments Table**: Contains details about each tournament.

### Factories

-   **`app/Http/Factories/UserFactory.php`**: Defines a factory for generating fake user data for testing.

### Resources

-   **`app/Http/Resources`**: Contains resource classes to transform data returned in API responses.
    -   **RegistrationCollection**: Wraps multiple registration resources.
    -   **RegistrationResource**: Defines the structure of a single registration response.
    -   **TournamentCollection**: Wraps multiple tournament resources.
    -   **TournamentResource**: Defines the structure of a single tournament response.
    -   **UserResource**: Defines the structure of a single user response.

### Authentication

The application uses Laravel's built-in authentication system with guards and providers defined in **`app/Http/Config/auth.php`**.

### Routes

#### Public Routes

-   **`POST /api/register`**: Registers a new user.
-   **`POST /api/login`**: Authenticates a user.

#### Protected Routes (requires authentication)

-   **`GET /api/user`**: Returns authenticated user details.
-   **`GET /api/users`**: Lists all users.
-   **`GET /api/users/{id}/registrations`**: Lists all registrations for a specific user.
-   **`GET /api/tournaments`**: Lists all tournaments.
-   **`POST /api/logout`**: Logs out the authenticated user.
-   **`POST /api/tournaments`**: Creates a new tournament.
-   **`DELETE /api/tournaments/{id}`**: Deletes a tournament.
-   **`GET /api/registrations`**: Lists all registrations.
-   **`PUT /api/registrations/{id}`**: Updates a registration.
-   **`POST /api/registrations`**: Creates a new registration.
-   **`DELETE /api/registrations/{id}`**: Deletes a registration.
