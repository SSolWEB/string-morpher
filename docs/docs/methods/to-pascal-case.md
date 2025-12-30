---
title: "toPascalCase"
parent: Methods
nav_order:
---

# toPascalCase

This method converts the string to PascalCase format, where each word is capitalized with no spaces.

## Usage

```php
$string = 'example string case';
$string = SM::toPascalCase($string);
// or
$string = SM::make($string)
    ->toPascalCase();
echo $string; // ExampleStringCase
```
