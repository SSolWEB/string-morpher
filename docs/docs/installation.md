---
title: "Instalation"
nav_order: 2
---

# Instalation

How to instalation

## Check Composer
To install the String Morpher package via Composer, follow these steps:

1. Ensure you have Composer installed. If you don't already have it, download and install Composer from getcomposer.org.

1. In your terminal, navigate to your project directory.

1. Run the following command to add the String Morpher package to your project:

```bash
composer require ssolweb/string-morpher
```

This will download the library and automatically update your project's composer.json file with the package details.

## Use
- After installation, you can include the package in your code and start using its powerful string manipulation features:

```php
require 'vendor/autoload.php';

use SSolWEB\StringMorpher\StringMorpher as SM;

$morpher = SM::onlyAlpha($string);
// Start morphing your strings here!
```

The String Morpher library is designed with a focus on simplicity and efficiency, allowing developers to chain multiple methods in a seamless and readable manner. This makes it easy to perform complex string manipulations in a single flow.

```php
// you can chain methods
$string = SM::make($string)
    ->trim()
    ->replace('fox', 'dog')
    ->sub(5, 20)
    ->toLower();

$captalizedAlpha = SM::onlyAlpha($string)
    ->captalize();

$brCpfMask = SM::onlyNumbers($string)
    ->maskBrCpf();

$pascalCase = SM::captalize($string)
    ->withoutSpaces();

// and use like a string
echo $string;
echo $captalizedAlpha;
$json = json_encode(['data' => $pascalCase]);
```
Chainable Methods: The methods in String Morpher are designed to return the instance of the class itself, enabling developers to apply multiple transformations step by step.

Clean and Readable Code: By chaining methods, you can avoid writing verbose and repetitive code. Each transformation is applied in sequence, improving both clarity and maintainability.

Enjoy 😊

Check [methods](/string-morpher/docs/methods/)