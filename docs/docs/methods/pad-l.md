---
title: "padL"
parent: Methods
nav_order: 13
---

# padL

This method repeatedly adds a character to the left of the string until the specified length is reached. If the string is equal to or greater than the target length, nothing is changed.

## Usage

```php
$string = 'abc123';
$string = SM::padL($string, 8, 'z');
// or
$string = SM::make($string)
    ->padL(8, 'z');
echo $string; // zzabc123
```
