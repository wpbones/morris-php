# MorrisJS PHP version for WP Bones

<p align="center">

  <a href="https://packagist.org/packages/wpbones/morris-php">
  <img src="https://poser.pugx.org/wpbones/morris-php/v/stable?style=for-the-badge" alt="Latest Stable Version" />
  </a>

  <a href="https://packagist.org/packages/wpbones/morris-php">
   <img src="https://poser.pugx.org/wpbones/morris-php/v/unstable?style=for-the-badge" alt="Latest Unstable Version" />
  </a>

  <a href="https://packagist.org/packages/wpbones/morris-php">
   <img src="https://poser.pugx.org/wpbones/morris-php/downloads?style=for-the-badge" alt="Total Downloads" />
  </a>

  <a href="https://packagist.org/packages/wpbones/morris-php">
   <img src="https://poser.pugx.org/wpbones/morris-php/license?style=for-the-badge" alt="License" />
  </a>

  <a href="https://packagist.org/packages/wpbones/morris-php">
   <img src="https://poser.pugx.org/wpbones/morris-php/d/monthly?style=for-the-badge" alt="Monthly Downloads" />
  </a>

</p>

This package provides a simple way to use the [MorrisJS](https://morrisjs.github.io/morris.js/) library in your WordPress plugin.

## Requirements

This package works with a WordPress plugin written with [WP Bones framework library](https://github.com/wpbones/WPBones).


## Installation

You can install third party packages by using:

```sh copy
php bones require wpbones/morris-php
```

I advise to use this command instead of `composer require` because doing this an automatic renaming will done.

You can use composer to install this package:

```sh copy
composer require wpbones/morris-php
```

You may also to add `"wpbones/morris-php": "~0.7"` in the `composer.json` file of your plugin:

```json copy filename="composer.json" {4}
  "require": {
    "php": ">=7.4.0",
    "wpbones/wpbones": "~1.5",
    "wpbones/morris-php": "~1.0"
  },
```

and run

```sh copy
composer install
```

## Enqueue for Controller

You can use the provider to enqueue the styles.

```php copy
public function index()
{
  // enqueue the minified version
  Morris::enqueue();

  // ...

}
```

In your view:

```php copy filename="your_view.php" copy
<div id="morris-area"></div>

<?php

echo Morris::area( 'morris-area' )
           ->xkey( [ 'y' ] )
           ->ykeys( [ 'a', 'b' ] )
           ->labels( [ 'Series A', 'Series B' ] )
           ->hoverCallback( 'function(index, options, content){var row = options.data[index];return "sin(" + row.x + ") = " + row.y;}' )
           ->data( [
                     [ "y" => '2006', "a" => 100, "b" => 90 ],
                     [ "y" => '2007', "a" => 75, "b" => 65 ],
                     [ "y" => '2008', "a" => 50, "b" => 40 ],
                     [ "y" => '2009', "a" => 75, "b" => 65 ],
                     [ "y" => '2010', "a" => 50, "b" => 40 ],
                     [ "y" => '2011', "a" => 75, "b" => 65 ],
                     [ "y" => '2012', "a" => 100, "b" => 90 ]
                   ] );
```
