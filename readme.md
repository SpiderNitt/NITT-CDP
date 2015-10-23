# NITT-CDP

## Instructions

Please use the 'dev' branch for any work.

**DO NOT DEVELOP ON THE MASTER BRANCH**

### Pre-setup (on clone)

- Copy `.env.example` to a `.env` file.
- Create a new database using `localhost/phpmyadmin` (or if you're feeling really badass, `mysql`)
- Make sure you set the collation to `utf8_general_ci`.

![Database Collation](http://s25.postimg.org/ll1s9820f/screenshot_1445630680.jpg)

- Set your environment values based on what `.env.example` tells you.
- Run `php artisan key:generate` for generating your local app key.


### On pull

- Pull latest changes
- Run `php artisan migrate` or `php artisan migrate:refresh`
- Don't delete any of the migration files. They aren't meant to be deleted.