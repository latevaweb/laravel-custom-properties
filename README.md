# Laravel Custom Properties

Trait to add dynamic custom properties to Eloquent models

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/latevaweb/laravel-custom-properties/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/latevaweb/laravel-custom-properties/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/latevaweb/laravel-custom-properties/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/latevaweb/laravel-custom-properties/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/latevaweb/laravel-custom-properties/badges/build.png?b=master)](https://scrutinizer-ci.com/g/latevaweb/laravel-custom-properties/build-status/master)
[![StyleCI](https://github.styleci.io/repos/231571767/shield?branch=master)](https://github.styleci.io/repos/231571767)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel 6.x](https://img.shields.io/badge/Laravel-6.x-orange.svg)](http://laravel.com)

Once the trait is installed on the model and migration field is added you can do these things:

```php
$customer = new Customer; // An Eloquent model
$customer
   ->setCustomProperty('foo', 'bar')
   ->setCustomProperty('foo2', 'bar2')
   ->save();
   
$customer->hasCustomProperty('foo'); // Returns 'true'

$customer->getCustomProperty('foo'); // returns 'bar'

$customer->forgetCustomProperty('foo'); // removes field 'foo' from model array

// Don't forget to persist it!

$customer->save();

```

## Installation

You can install the package via composer:

``` bash
composer require latevaweb/laravel-custom-properties
```

## Adding custom properties to a Model

The required steps to add custom properties to a model are:

- First, you need to add the `LaTevaWeb\CustomProperties\HasCustomProperties`-trait.
- It is required to add to your model table the field `$table->json('custom_properties')->nullable();`

Here's an example of a prepared model:

```php
use Illuminate\Database\Eloquent\Model;
use LaTevaWeb\CustomProperties\HasCustomProperties;

class NewsItem extends Model
{
    use HasCustomProperties;
}
```

And the migration:
```php
Schema::table('your_table', function (Blueprint $table) {
    $table->json('custom_properties')->nullable();
});
```

