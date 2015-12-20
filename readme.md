# NITT-CDP

## Instructions

Please use the 'dev' branch for any work.

### Pre-setup (on clone)

- Run `composer install`
- Copy `.env.example` to a `.env` file.
- Create a new database using `localhost/phpmyadmin` (or if you're feeling really badass, `mysql`)
- Make sure you set the collation to `utf8_general_ci`.

![Database Collation](http://s25.postimg.org/ll1s9820f/screenshot_1445630680.jpg)

- Edit `.env` to set your environment values based on what `.env.example` tells you.
- Run `php artisan key:generate` for generating your local app key.

Now you can start the server with `php artisan serve`.

### On pull

- Pull latest changes
- Run `php artisan migrate` or `php artisan migrate:refresh`
- Don't delete any of the migration files. They aren't meant to be deleted.

### Notes

- Watch for commit labels. `[MIGRATION]` or `[UPDATE_LIB]` tell you to run `php artisan migrate` or `composer update` respectively.
- Attach appropriate commit labels for development work.

----

## Roadmap

### Development Log

- Basic user model complete. Some fields not present.
- JWTAuth Library by TymonDesigns added
- Basic user validation
- Basic user login and token return

### Todo

#### User Model, Registration, Login

- Update student / faculty specific details
- Token specific details
- Authentication middleware
- Database transaction-oriented approach
