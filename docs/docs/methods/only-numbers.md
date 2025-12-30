---
title: "onlyNumbers"
parent: Methods
nav_order:
---

# onlyNumbers

This method keeps only numeric digits, removing all letters, spaces, and special characters.

## Usage

```php
$string = 'Hello 123 world';
$string = SM::onlyNumbers($string);
// or
$string = SM::make($string)
    ->onlyNumbers();
echo $string; // 123
```
