# Laravel GSM Call Web Project

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Features](#features)
- [Installation](#installation)
- [Development Workflow](#development-workflow)
- [Jenkins Integration](#jenkins-integration)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
  

## Introduction

This is a web application built with Laravel and Vue that allows registered users to trigger GSM calls from a web browser. The admin panel provides functionality to manage registered users, view call logs, and generate reports.


## Prerequisites

Before you get started, make sure you have the following tools installed:

- [Docker](https://docs.docker.com/get-docker/)
- [DockerCompose](https://docs.docker.com/compose/install/)

## Features

- **User Registration**: Users can register and create accounts through the admin panel.
- **GSM Call Triggering**: Registered users can initiate GSM calls from their web browsers.
- **Call Logging**: All calls triggered by users are logged, recording important details such as time, duration, and the user who initiated the call


## Installation

- Clone this repository to your local machine:
  ```bash
     git clone https://github.com/cgardesey/afa_call.git
- Navigate to the project directory:
   ```bash
      cd applications
- Create a .env file:
   ```bash
      cp .env.example .env
- Generate the application key:
   ```bash
      ./vendor/bin/sail artisan key:generate
- Set up your database credentials in the .env file:
   ```bash
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=your_database_name
      DB_USERNAME=your_database_username
      DB_PASSWORD=your_database_password
- Start the Docker environment using Sail:
   ```bash
      ./vendor/bin/sail up -d
- Install composer dependencies:
   ```bash
      ./vendor/bin/sail composer install
 - Build your frontend application using the Vite build tool:
    ```bash
       ./vendor/bin/sail npm run build     
- Generate a Laravel application key:
   ```bash
      ./vendor/bin/sail artisan key:generate
- Run the database migrations and seed the database:
   ```bash
      ./vendor/bin/sail artisan migrate --seed
- Your Laravel application should now be accessible at http://localhost.
- Run all tests (unit and feature tests):

  ```bash
    ./vendor/bin/sail artisan test
All test should pass as shown:


![Screenshot from 2023-09-26 13-47-51](https://github.com/cgardesey/afa_call/assets/10109354/52cc20b3-7685-4ea3-8ed6-d1e578b34e19)





## Development Workflow

The application follows a standard Laravel Development Workflow:

-  To start the Docker environment: `./vendor/bin/sail up -d`
-  To stop the Docker environment: `./vendor/bin/sail down`
-  To run artisan commands: `./vendor/bin/sail artisan your-command`
-  To access the application's shell: `./vendor/bin/sail shell`

## Jenkins Integration
To automate your CI/CD process, you can use Jenkins. A Jenkinsfile has been added to the project for this purpose. You can configure your Jenkins server to build and deploy the application based on this file.

The jenkins pipeline consists of the following stages:

1. **Checkout**: This stage checks out the latest code from our Git repository.

2. **Create .env File**: This stage create the `.env` file for the Laravel application.

3. **Build and Deploy**: This stage involves building and deploying the application using Docker and Laravel Sail.

4. **Test**: This stage run the test suite and check if the tests pass.

Here is a screenshot showing the successful completion of all Jenkins stages:

![image](https://github.com/cgardesey/afa_call/assets/10109354/3a438aee-fa41-4fb8-9ae7-405ab8177558)

## Deployment

For deployment, make sure to adjust your environment settings in the .env file according to your production environment. You can use tools like Forge or deploy directly to a server.

## Contributing

I welcome contributions! If you find a bug or have an improvement suggestion, please open an issue or submit a pull request.

Check out the the [same project](https://github.com/cgardesey/afa_call_verify) implemented in laravel 5.8.

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

## Contact

If you have any questions or need assistance, please contact me at cyrilgardesey@gmail.com.

Happy coding!

   

