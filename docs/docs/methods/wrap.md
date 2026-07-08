---
title: wrap
parent: Methods
nav_order:
---

# wrap

Wraps a string with a prefix and suffix.

## Usage

```php
$string = 'abc';
$string = SM::wrap($string, '(', ')');
// or fluent
$string = SM::make($string)
    ->wrap('(', ')');

echo $string; // (abc)
```

## Wrap ommiting suffix

If the suffix is not provided, it defaults to the same value as the prefix.

```php
$string = 'abc';
$string = SM::wrap($string, '"');
// or fluent
$string = SM::make($string)
    ->wrap('"');

echo $string; // "abc"
```
