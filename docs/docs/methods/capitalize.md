---
title: "capitalize"
parent: Methods
nav_order: 1
---

# capitalize

This method capitalizes the first letter of each word in the current payload.

## Usage

```php
$string = 'hello world';
$string = SM::capitalize($string);
// or
$string = SM::make($string)
    ->capitalize();
echo $string; // Hello World
```
