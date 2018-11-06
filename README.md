# Blumblr

The Bootcamp Laravel Tumblr

## Installing

1. Clone or download this repository.
1. Run these commands to set up your local environment:

```
$ composer install           # installs PHP dependencies
$ npm install                # installs JS dependencies
$ cp .env.example .env       # creates local environment file
$ php artisan key:generate   # creates local app key
```

## Serving

Run `php artisan serve` to serve the site to http://localhost:8000.

## Compiling

Run `npm run dev` to compile all assets once. To automatically compile when a file change is detected, run `npm run watch`.
