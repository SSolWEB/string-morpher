---
title: "fromBase64"
parent: Methods
nav_order:
---

# fromBase64

This method decodes a Base64-encoded string back to its original form.

## Usage

```php
$string = 'SGVsbG8gd29ybGQ=';
$string = SM::fromBase64($string);
// or
$string = SM::make($string)
    ->fromBase64();
echo $string; // Hello world
```
