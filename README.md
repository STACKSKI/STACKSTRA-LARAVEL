# STACKSTRA Laravel Bridge

A service provider that integrates [STACKSTRA](https://github.com/stackski/stackstra), a standalone PHP helper library, with Laravel.

- **Namespace:** `Stackstra\Laravel\`
- **Requires:** PHP ^8.5, Laravel 11.x, 12.x or 13.x
- **Install:** `composer require stackski/stackstra-laravel`

## What it does

Registers `Stackstra\Laravel\StackstraServiceProvider`, auto-discovered by Laravel.

- Syncs `Stackstra\Etc\Debug` with your app's `config('app.debug')` setting, so STACKSTRA's debug-only behavior follows your environment automatically.
- Binds `Stackstra\Lock\Lock` as a singleton, resolvable via the container. The lock file path is read from `config('stackstra.lock_path')` and falls back to `storage_path('app/stackstra.lock')` if unset.

Everything else in STACKSTRA works as plain PHP with no Laravel-specific wiring needed. See the [core library docs](https://github.com/stackski/stackstra) for the full class reference.

## Configuration

This package does not publish a config file. To change the lock path, create your own `config/stackstra.php` in your application:

```php
<?php

// config/stackstra.php
return [
    'lock_path' => env('STACKSTRA_LOCK_PATH', storage_path('app/stackstra.lock')),
];
```

## Usage

Resolve the lock from the container:

```php
use Stackstra\Lock\Lock;

$lock = app(Lock::class);

if ($lock->lock())
{
    try
    {
        // Only one process runs this at a time
    }
    finally
    {
        $lock->unlock();
    }
}
```

You can also type-hint `Lock` in a controller, job, or command, and Laravel will inject the same singleton.

## About

Maintained by [STACKSKI Inc.](https://stackski.com), an IT consulting and Laravel web development company. Visit us at [stackski.com/laravel](https://stackski.com/laravel) (US) or [stackski.ca/laravel](https://stackski.ca/laravel) (Canada).

STACKSTRA Laravel Bridge is maintained independently by STACKSKI and is not affiliated with, sponsored by, or endorsed by Laravel.

## License

[MIT](LICENSE)
