# MorrisJS PHP version for WP Bones

[![Latest Stable Version](https://poser.pugx.org/wpbones/morris-php/v/stable)](https://packagist.org/packages/wpbones/morris-php)
[![Total Downloads](https://poser.pugx.org/wpbones/morris-php/downloads)](https://packagist.org/packages/wpbones/morris-php)
[![Latest Unstable Version](https://poser.pugx.org/wpbones/morris-php/v/unstable)](https://packagist.org/packages/wpbones/morris-php)
[![License](https://poser.pugx.org/wpbones/morris-php/license)](https://packagist.org/packages/wpbones/morris-php)

## Requirements

This package works with a WordPress plugin written with [WP Bones framework library](https://github.com/wpbones/WPBones).

## Installation

You can install third party packages by using:

    $ php bones require wpbones/pure-css-tabs
   
I advise to use this command instead of `composer require` because doing this an automatic renaming will done.  

    $ composer require wpbones/morris-php
    
## Updating
    
    $ php bones update

## Enqueue for Controller

You can use the provider to enqueue the styles.

```php
public function index()
{
  // enqueue the minified version
  Morris::enqueue();
  
  // ...
  
}
```

In your view:

```html
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
