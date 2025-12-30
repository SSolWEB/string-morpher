---
title: "replaceRegex"
parent: Methods
nav_order: 16
---

# replaceRegex

This method replaces all occurrences matching a regular expression pattern with a replacement string.

## Usage

```php
$string = 'The  quick   brown    fox jumps';
$string = SM::replaceRegex($string, '/\s+/', ' ');
// or
$string = SM::make($string)
    ->replaceRegex('/\s+/', ' ');
echo $string; // The quick brown fox jumps
```
