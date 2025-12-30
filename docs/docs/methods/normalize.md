---
title: "normalize"
parent: Methods
nav_order: 10
---

# normalize

This method removes all accents and special characters from the string, preserving only alphanumeric characters and spaces.

## Usage

```php
$string = 'âäàåçêëèïîìÆôöòûùÿ';
$string = SM::normalize($string);
// or
$string = SM::make($string)
    ->normalize();
echo $string; // aaaaceeeiiiooouuy
```
