---
title: "Methods"
nav_order: 3
---

# Methods

Documentation of methods

The String Morpher library is designed with a focus on simplicity and efficiency, allowing developers to chain multiple methods in a seamless and readable manner. This makes it easy to perform complex string manipulations in a single flow.

```php
use SSolWEB\StringMorpher\StringMorpher as SM; // Dont Forget to import the magic!

$pascalCase = SM::capitalize('the quick brown fox jumps over the lazy dog')
    ->withoutSpaces();
echo $pascalCase; // TheQuickBrownFoxJumpsOverTheLazyDog

$slug = SM::toLower(' The quick brown Fox jumps over the lazy Dog ')
    ->trim()
    ->replace(' ', '-');
echo $slug; // the-quick-brown-fox-jumps-over-the-lazy-dog
```