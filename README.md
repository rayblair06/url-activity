# Laravel Url Activity

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rayblair/url-activity.svg?style=flat-square)](https://packagist.org/packages/rayblair/url-activity)
[![Build Status](https://img.shields.io/travis/rayblair/url-activity/master.svg?style=flat-square)](https://travis-ci.org/rayblair/url-activity)
[![Quality Score](https://img.shields.io/scrutinizer/g/rayblair/url-activity.svg?style=flat-square)](https://scrutinizer-ci.com/g/rayblair/url-activity)
[![Total Downloads](https://img.shields.io/packagist/dt/rayblair/url-activity.svg?style=flat-square)](https://packagist.org/packages/rayblair/url-activity)

Records every url request, as well as user information, that is requested within your specified middleware group.

## Installation

You can install the package via composer:

```bash
composer require rayblair/url-activity
```

## Usage

Add `\Rayblair\UrlActivity\Http\Middleware\UrlActivityMiddleware::class` to your middleware.

```php
protected $middlewareGroups = [
    'web' => [
        ...
        \Rayblair\UrlActivity\Http\Middleware\UrlActivityMiddleware::class
    ],

    'auth' => [
        ...
        \Rayblair\UrlActivity\Http\Middleware\UrlActivityMiddleware::class
    ],

    'api' => [
        ...
        \Rayblair\UrlActivity\Http\Middleware\UrlActivityMiddleware::class
    ],
];
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email rayblair06@hotmail.com instead of using the issue tracker.

## Credits

-   [Ray Blair](https://github.com/rayblair)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
