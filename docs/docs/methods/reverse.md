---
title: "reverse"
parent: Methods
nav_order: 17
---

# reverse

This method reverses the entire string, placing the last character first and the first character last.

## Usage

```php
$string = 'spmuj xof nworb kciuq ehT';
$string = SM::reverse($string);
// or
$string = SM::make($string)
    ->reverse();
echo $string; // The quick brown fox jumps
```
