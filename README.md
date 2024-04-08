# Restaurant Booking

Welcome to the `restaurant-booking` project! This application is designed to simplify the process of booking tables at your favorite restaurants, providing an easy-to-use interface for customers.

## Prerequisites

Before you get started, ensure you have the following installed:

-   [Docker](https://www.docker.com/get-started)
-   [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) (Optional, but recommended for cloning the repository)

## Getting Started

Follow these steps to set up the project locally. **Steps 1, 2, 3, 4, 6, 7 and 8 are required only for the initial setup and need to be completed only once.** After the initial setup, you can start the application by repeating step 5 to bring up the Docker environment and step 9 to compile assets with npm.

### 1. Clone the Repository

First, clone the repository to your local machine or download the project files directly.

```bash
git clone https://github.com/TsvetomirMotsarkanov/restaurant-booking.git
```

### 2. Navigate to Project Directory

Change into the project directory:

```bash
cd {path_to_project}/restaurant-booking-main
```

### 3. Environment Configuration

Copy the example environment configuration file to a new `.env` file:

```bash
cp .env.example .env
```

### 4. Install Dependencies

Use Docker to install the project dependencies without having to worry about your local environment setup:

```bash
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs
```

### 5. Start the Application

Start the application using Laravel Sail:

```bash
./vendor/bin/sail up
```

### 6. Generate Application Key

In a new terminal window, generate an application key:

```bash
./vendor/bin/sail php artisan key:generate
```

### 7. Database Migration and Seeding

Run migrations and seed the database with initial data:

```bash
./vendor/bin/sail php artisan migrate:fresh --seed
```

### 8. Npm Install

Before compiling the assets, install the npm packages:

```bash
./vendor/bin/sail npm install
```

### 9. Compile Assets

Finally, compile the front-end assets:

```bash
./vendor/bin/sail npm run dev
```

## Accessing the Application

Once everything is set up, you can access the application in your web browser at `http://localhost`.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
