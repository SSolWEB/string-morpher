---
title: "append"
parent: Methods
nav_order:
---

# append

This method appends a given string to the end of the input string.

## Usage

```php
$string = 'Hello';
$string = SM::append($string, ' World');
// or
$string = SM::make($string)
    ->append(' World');
echo $string; // Hello World
```