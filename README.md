# Laravel Project

This repository contains a Laravel project that allows users to sign up/sign in and then verify their BVN

## Installation

Follow the steps below to install and run the project on your local machine.

### Prerequisites

Make sure you have the following software installed on your system:

- PHP
- Composer
- Node.js (with npm or Yarn)

### Clone the Repository


- git clone https://github.com/younghallaji/bvnVerification.git
- cd bvnVerification

### Install PHP Dependencies

composer install

### Configure the Environment
- Copy the .env.example file and rename it to .env:
- cp .env.example .env
- Edit the .env file and set up your database connection by providing your database credentials.

### Generate Application Key

php artisan key:generate

### Run Database Migrations

php artisan migrate

### Install JavaScript Dependencies

npm install
-
Or
-
yarn install
-

### Build Assets

npm run dev or yarn dev

### Start the Development Server

php artisan serve

Once the development server is running, you can access the Laravel project by visiting the URL displayed by the php artisan serve command.
-























