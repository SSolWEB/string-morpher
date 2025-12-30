---
title: "toSnakeCase"
parent: Methods
nav_order: 27
---

# toSnakeCase

This method converts the string to snake_case format, where words are separated by underscores and all lowercase.

## Usage

```php
$string = 'example string case';
$string = SM::toSnakeCase($string);
// or
$string = SM::make($string)
    ->toSnakeCase();
echo $string; // example_string_case
```
