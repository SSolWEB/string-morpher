---
title: "replaceRegex"
parent: Methods
nav_order:
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

### Perform a regular expression search and replace

```php
$string = 'March 24, 2025';
$string = SM::limit($string, '/(\w+) (\d+), (\d+)/i', '$3, $1 $2');
// or
$string = SM::make($string)
    ->limit('/(\w+) (\d+), (\d+)/i', '$3, $1 $2');
echo $string; // '2025, March 24'
```