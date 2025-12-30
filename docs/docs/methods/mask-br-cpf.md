---
title: "maskBrCpf"
parent: Methods
nav_order: 7
---

# maskBrCpf

This method applies the Brazilian CPF (individual taxpayer registration) mask to the string.

## Usage

```php
$string = '11122233344';
$string = SM::maskBrCpf($string);
// or
$string = SM::make($string)
    ->maskBrCpf();
echo $string; // 111.222.333-44
```
