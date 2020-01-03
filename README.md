# Laravel Custom Properties

Trait to add dynamic custom properties to Eloquent models

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

