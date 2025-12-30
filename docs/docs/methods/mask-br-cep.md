---
title: "maskBrCep"
parent: Methods
nav_order:
---

# maskBrCep

This method applies the Brazilian CEP (postal code) mask to the string.

## Usage

```php
$string = '44555666';
$string = SM::maskBrCep($string);
// or
$string = SM::make($string)
    ->maskBrCep();
echo $string; // 44.555-666
```
