---
title: "withoutSpaces"
parent: Methods
nav_order:
---

# withoutSpaces

This method removes all spaces from the string, keeping all other characters intact.

## Usage

```php
$string = 'Hello world';
$string = SM::withoutSpaces($string);
// or
$string = SM::make($string)
    ->withoutSpaces();
echo $string; // Helloworld
```
