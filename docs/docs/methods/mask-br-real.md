---
title: "maskBrReal"
parent: Methods
nav_order:
---

# maskBrReal

This method applies the Brazilian Real currency format to the string, supporting both string and numeric inputs.

## Usage

```php
$string = '1234864.20'; // or float or int
$string = SM::maskBrReal($string);
// or
$string = SM::make($string)
    ->maskBrReal();
echo $string; // R$ 1.234.864,20
```
