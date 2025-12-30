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
