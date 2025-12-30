---
title: "sub"
parent: Methods
nav_order:
---

# sub

This method extracts a portion of the string (substring) starting at a specified position and with a specified length.

## Usage

```php
$string = 'Hello world';
$string = SM::sub($string, 3, 5);
// or
$string = SM::make($string)
    ->sub(3, 5);
echo $string; // lo wo
```
