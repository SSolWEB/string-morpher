---
title: "remove"
parent: Methods
nav_order:
---

# remove

This method removes all occurrences of a search string or strings from a string. It supports both case-sensitive and case-insensitive removal.

## Usage

```php
$string = 'test string';
$string = SM::remove($string, 'st');
// or
$string = SM::make($string)
    ->remove('st');
echo $string; // te ring
```

### Case-insensitive removal parameter

```php
$string = 'Hello HELLO';
$string = SM::remove($string, 'hello', false);
// or
$string = SM::make($string)
    ->remove('hello', false);
var_export($string); // ' '
```
