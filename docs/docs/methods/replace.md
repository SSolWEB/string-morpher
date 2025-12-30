---
title: "replace"
parent: Methods
nav_order: 15
---

# replace

This method replaces all occurrences of a search string with a replacement string. It supports both case-sensitive and case-insensitive replacement.

## Usage

```php
$string = 'The quick brown fox jumps';
$string = SM::replace($string, 'fox', 'dog');
// or
$string = SM::make($string)
    ->replace('fox', 'dog');
echo $string; // The quick brown dog jumps
```

## Examples

### Case-insensitive replacement

```php
$string = 'The quick brown Fox jumps';
$string = SM::replace($string, 'fox', 'Dog', false);
// or
$string = SM::make($string)
    ->replace('fox', 'Dog', false);
echo $string; // The quick brown Dog jumps
```
