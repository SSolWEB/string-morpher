---
title: "toKebabCase"
parent: Methods
nav_order:
---

# toKebabCase

This method converts the string to kebab-case format, where words are separated by hyphens and all lowercase.

## Usage

```php
$string = 'example string case';
$string = SM::toKebabCase($string);
// or
$string = SM::make($string)
    ->toKebabCase();
echo $string; // example-string-case
```
