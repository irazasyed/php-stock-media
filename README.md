# PHP Stock Media

[![Latest Version on Packagist](https://img.shields.io/packagist/v/irazasyed/php-stock-media.svg?style=flat-square)](https://packagist.org/packages/irazasyed/php-stock-media)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/irazasyed/php-stock-media/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/irazasyed/php-stock-media/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/irazasyed/php-stock-media/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/irazasyed/php-stock-media/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/irazasyed/php-stock-media.svg?style=flat-square)](https://packagist.org/packages/irazasyed/php-stock-media)

PHP Stock Media - the ultimate library for sourcing stock images, stock videos, and other stock media resources from multiple online stock services with Laravel support out of the box!

## Installation

You can install the package via composer:

```bash
composer require irazasyed/php-stock-media
```

You can publish config file, if you're using Laravel:

```bash
php artisan vendor:publish --tag="php-stock-media-config"
```

## Usage

```php
use Irazasyed\StockMedia;
use Irazasyed\StockMedia\Services\Unsplash;

$apiKey = 'UNSPLASH_API_KEY';

$stockMedia = new StockMedia();
$stockMedia->setDefault(Unsplash::class);

$service = $stockMedia->setApiKey($apiKey);
$result = $service->search(['query' => 'nature']);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Irfaq Syed](https://github.com/irazasyed)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
