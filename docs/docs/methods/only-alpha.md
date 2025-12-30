---
title: "onlyAlpha"
parent: Methods
nav_order:
---

# onlyAlpha

This method keeps only alphabetic letters, removing all numbers, spaces, and special characters.

## Usage

```php
$string = 'Hello 123 world';
$string = SM::onlyAlpha($string);
// or
$string = SM::make($string)
    ->onlyAlpha();
echo $string; // Helloworld
```
