# STACKSTRA Laravel Bridge

Laravel service provider for [STACKSTRA](https://github.com/stackski/stackstra), a standalone PHP helper library.

- **Namespace:** `Stackstra\Laravel\`
- **Requires:** PHP ^8.5, Laravel ^11.0|^12.0
- **Install:** `composer require stackski/stackstra-laravel`

## What it does

Registers `Stackstra\Laravel\StackstraServiceProvider`, auto-discovered by Laravel.

- Syncs `Stackstra\Etc\Debug` with your app's `config('app.debug')` setting, so STACKSTRA's debug-only behavior follows your environment automatically.
- Binds `Stackstra\Lock\Lock` as a singleton, resolvable via the container. The lock file path can be set with `config('stackstra.lock_path')` (e.g. in your app's own `config/services.php`); it falls back to `storage_path('app/stackstra.lock')` if unset. No config file is published by this package.

Everything else in STACKSTRA works as plain PHP with no Laravel-specific wiring needed. See the [core library docs](https://github.com/stackski/stackstra) for the full class reference.

## About

Maintained by [STACKSKI Inc.](https://stackski.com), an IT consulting and Laravel web development company. Visit us at [stackski.com/laravel](https://stackski.com/laravel) (US) or [stackski.ca/laravel](https://stackski.ca/laravel) (Canada).

## License

MIT
