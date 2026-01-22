---
title: prepend
parent: Methods
nav_order:
---

# prepend

Prepends a string to the beginning of the input string.

## Usage

```php
$string = 'World';
$string = SM::prepend($string, 'Hello ');
// or
$string = SM::make('World')
    ->prepend('Hello ');
echo $string; // Hello World
```
