---
title: "toBase64"
parent: Methods
nav_order: 20
---

# toBase64

This method encodes the string to Base64 format.

## Usage

```php
$string = 'Hello world';
$string = SM::toBase64($string);
// or
$string = SM::make($string)
    ->toBase64();
echo $string; // SGVsbG8gd29ybGQ=
```
