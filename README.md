# Installation Process

## Laravel
To use laravel dependencies existing in composer.json.

```bash
composer install
```

## Database
To prepare database

```bash
Step 1:
# Configure the .env file for the prepartion of database

DB_DATABASE=db_praxxys_exam
DB_USERNAME=root
DB_PASSWORD=

Step 2:
Create new database # db_praxxys_exam
```
## Storage/Public Folder
To connect storage to public

```bash
php artisan storage:link
```

## Migration
Open cmd terminal inside the project and run this command to reflect
changes in database

```bash
php artisan migrate
# returns 'Dropped all tables successfully.'
# returns 'Migration table created successfully.'
# returns 'Migrating: 2014_10_12_000000_create_users_table'
# returns 'Migrated:  2014_10_12_000000_create_users_table (701.63ms)'
# returns '...'
```

## Seeder
Open the terminal inside the project and type this command to have 
initial data

```bash
php artisan db:seed --class DatabaseSeeder # returns 'Database seeding completed successfully.'
```

## Vue Js
To use vuejs dependencies and devDependencies existing in package.json

```bash
npm install
```

## Run Project
To run the whole project type these commands in cmd terminal

```bash
php artisan serve # to run laravel
npm run watch # to run vue.js
```

## Credentials
All users data will be generated after the seeder by faker factory except in password column. All user's password are the same.
The password is static and not dynamic but it will be hashed or encrypted after seeder execution.

```bash
000000 # type this '6 zeros' as your password
```


