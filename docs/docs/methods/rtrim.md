---
title: "rtrim"
parent: Methods
nav_order:
---

# rtrim

This method removes whitespace (or other characters) from the end of the string.

## Usage

```php
$string = ' Hello world ';
$string = SM::rtrim($string);
// or
$string = SM::make($string)
    ->rtrim();
echo $string; //  Hello world
```

### Custom characters to trim

```php
// You can specify which characters to trim
$string = SM::rtrim($string, " \n\r\t\v\0");
// or
$string = SM::make($string)
    ->rtrim(" \n\r\t\v\0");
```
