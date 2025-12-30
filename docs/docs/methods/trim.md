---
title: "trim"
parent: Methods
nav_order:
---

# trim

This method removes whitespace (or other characters) from both the beginning and end of the string.

## Usage

```php
$string = ' Hello world ';
$string = SM::trim($string);
// or
$string = SM::make($string)
    ->trim();
echo $string; // Hello world
```

### Custom characters to trim

```php
// You can specify which characters to trim
$string = SM::trim($string, " \n\r\t\v\0");
// or
$string = SM::make($string)
    ->trim(" \n\r\t\v\0");
```
