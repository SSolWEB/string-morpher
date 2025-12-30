---
title: "toTrainCase"
parent: Methods
nav_order:
---

# toTrainCase

This method converts the string to Train-Case format, where words are separated by hyphens and each word is capitalized.

## Usage

```php
$string = 'example string case';
$string = SM::toTrainCase($string);
// or
$string = SM::make($string)
    ->toTrainCase();
echo $string; // Example-String-Case
```
