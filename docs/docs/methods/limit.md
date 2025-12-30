---
title: "limit"
parent: Methods
nav_order:
---

# limit

This method limits the string to a specified length. You can optionally add an ending string that will be appended at the truncation point.

If the length is less than the length of the ending string, the ending will become the new string.

## Usage

```php
$string = 'The quick brown fox jumps over the lazy dog';
$string = SM::limit($string, 30);
// or
$string = SM::make($string)
    ->limit(30);
echo $string; // The quick brown fox jumps over
```

### With custom ending

```php
$string = 'The quick brown fox jumps over the lazy dog';
$string = SM::limit($string, 30, '[...]');
// or
$string = SM::make($string)
    ->limit(30, '[...]');
echo $string; // The quick brown fox jumps[...]
```
