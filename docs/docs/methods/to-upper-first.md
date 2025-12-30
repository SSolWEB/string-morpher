---
title: "toUpperFirst"
parent: Methods
nav_order: 30
---

# toUpperFirst

This method capitalizes only the first letter of the string while keeping the rest unchanged.

## Usage

```php
$string = 'hello world';
$string = SM::toUpperFirst($string);
// or
$string = SM::make($string)
    ->toUpperFirst();
echo $string; // Hello world
```
