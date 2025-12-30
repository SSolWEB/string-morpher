---
title: "toDotCase"
parent: Methods
nav_order: 22
---

# toDotCase

This method converts the string to dot.case format, where words are separated by periods and all lowercase.

## Usage

```php
$string = 'example string case';
$string = SM::toDotCase($string);
// or
$string = SM::make($string)
    ->toDotCase();
echo $string; // example.string.case
```
