---
title: unwrap
parent: Methods
nav_order:
---

# unwrap

Removes a matching prefix and suffix from a string.

## Usage

```php
$string = '(abc)';
$string = SM::unwrap($string, '(', ')');
// or
$string = SM::make($string)
    ->unwrap('(', ')');

echo $string; // abc
```

## Wrap omitting suffix

If the suffix is not provided, it defaults to the same value as the prefix.

```php
$string = '"abc"';
$string = SM::unwrap($string, '"');
// or
$string = SM::make($string)
    ->unwrap('"');

echo $string; // abc
```
