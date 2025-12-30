---
title: "maskBrPhone"
parent: Methods
nav_order:
---

# maskBrPhone

This method applies the Brazilian phone number mask to the string.

## Usage

```php
$string = '11988887777';
$string = SM::maskBrPhone($string);
// or
$string = SM::make($string)
    ->maskBrPhone();
echo $string; // (11) 98888-7777
```
