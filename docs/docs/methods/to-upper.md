---
title: "toUpper"
parent: Methods
nav_order: 29
---

# toUpper

This method transforms all characters in the string to uppercase.

## Usage

```php
$string = 'HeLlO wOrLd';
$string = SM::toUpper($string);
// or
$string = SM::make($string)
    ->toUpper();
echo $string; // HELLO WORLD
```
