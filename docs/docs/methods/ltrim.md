---
title: "ltrim"
parent: Methods
nav_order: 4
---

# ltrim

This method removes whitespace (or other characters) from the beginning of the string.

## Usage

```php
$string = ' Hello world ';
$string = SM::ltrim($string);
// or
$string = SM::make($string)
    ->ltrim();
echo $string; // Hello world 
```

## Examples

### Custom characters to trim

```php
// You can specify which characters to trim
$string = SM::ltrim($string, " \n\r\t\v\0");
// or
$string = SM::make($string)
    ->ltrim(" \n\r\t\v\0");
```
