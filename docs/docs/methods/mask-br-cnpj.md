---
title: "maskBrCnpj"
parent: Methods
nav_order:
---

# maskBrCnpj

This method applies the Brazilian CNPJ (company registration number) mask to the string.

## Usage

```php
$string = '11222333444455';
$string = SM::maskBrCnpj($string);
// or
$string = SM::make($string)
    ->maskBrCnpj();
echo $string; // 11.222.333/4444-55
```

### With the alphanumeric version of 2026

```php
$string = 'CAA3K5CZ000110';
$string = SM::maskBrCnpj($string);
// or
$string = SM::make($string)
    ->maskBrCnpj();
echo $string; // CA.A3K.5CZ/0001-10
```
