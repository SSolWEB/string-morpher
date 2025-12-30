---
title: "toUpperSnakeCase"
parent: Methods
nav_order: 31
---

# toUpperSnakeCase

This method converts the string to UPPER_SNAKE_CASE format, where words are separated by underscores and all uppercase.

## Usage

```php
$string = 'example string case';
$string = SM::toUpperSnakeCase($string);
// or
$string = SM::make($string)
    ->toUpperSnakeCase();
echo $string; // EXAMPLE_STRING_CASE
```
