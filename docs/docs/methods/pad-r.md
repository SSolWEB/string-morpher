---
title: "padR"
parent: Methods
nav_order: 14
---

# padR

This method repeatedly adds a character to the right of the string until the specified length is reached. If the string is equal to or greater than the target length, nothing is changed.

## Usage

```php
$string = 'abc123';
$string = SM::padR($string, 8, 'z');
// or
$string = SM::make($string)
    ->padR(8, 'z');
echo $string; // abc123zz
```
