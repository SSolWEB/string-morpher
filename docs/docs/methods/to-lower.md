---
title: "toLower"
parent: Methods
nav_order:
---

# toLower

This method transforms all characters in the string to lowercase.

## Usage

```php
$string = 'HeLlO wOrLd';
$string = SM::toLower($string);
// or
$string = SM::make($string)
    ->toLower();
echo $string; // hello world
```
