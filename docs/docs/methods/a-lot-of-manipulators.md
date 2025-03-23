---
title: A lot of manipulators
parent: Methods
nav_order: 2
---

# String useful manipulation
{: .no_toc }

1. TOC
{:toc}

## capitalize
Capitalize each word

```php
$string = SM::capitalize($string);
$string = SM::withoutSpaces($string)
    ->capitalize();
```

## onlyNumbers
Only keep numbers

```php
$string = SM::onlyNumbers($string);
$string = SM::withoutSpaces($string)
    ->onlyNumbers();
```

## onlyAlpha
Only keep letters

```php
$string = SM::onlyAlpha($string);
$string = SM::withoutSpaces($string)
    ->onlyAlpha();
```

## withoutSpaces
Remove all spaces

```php
$string = SM::withoutSpaces($string);
$string = SM::capitalize($string)
    ->withoutSpaces();
```
