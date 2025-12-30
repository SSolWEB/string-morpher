---
title: "toFlatCase"
parent: Methods
nav_order: 23
---

# toFlatCase

This method converts the string to flatcase format, removing all spaces and special characters while keeping everything lowercase.

## Usage

```php
$string = 'example string case';
$string = SM::toFlatCase($string);
// or
$string = SM::make($string)
    ->toFlatCase();
echo $string; // examplestringcase
```
