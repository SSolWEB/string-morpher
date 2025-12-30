---
title: "toCamelCase"
parent: Methods
nav_order:
---

# toCamelCase

This method converts the string to camelCase format, where the first word is lowercase and subsequent words are capitalized with no spaces.

## Usage

```php
$string = 'example string case';
$string = SM::toCamelCase($string);
// or
$string = SM::make($string)
    ->toCamelCase();
echo $string; // exampleStringCase
```
