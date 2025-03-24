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
$string = 'hello world';
$string = SM::capitalize($string);
// or
$string = SM::make($string)
    ->capitalize();
echo $string; // Hello World
```

## fromBase64
Decode from base64

```php
$string = 'SGVsbG8gd29ybGQ=';
$string = SM::fromBase64($string);
// or
$string = SM::make($string)
    ->fromBase64();
echo $string; // Hello world
```

## onlyAlpha
Only keep letters

```php
$string = 'Hello 123 world';
$string = SM::onlyAlpha($string);
// or
$string = SM::make($string)
    ->onlyAlpha();
echo $string; // Helloworld
```

## onlyNumbers
Only keep numbers

```php
$string = 'Hello 123 world';
$string = SM::onlyNumbers($string);
// or
$string = SM::make($string)
    ->onlyNumbers();
echo $string; // 123
```

## sub
Performs substring

```php
$string = 'Hello world';
$string = SM::sub($string, 3, 5);
// or
$string = SM::make($string)
    ->sub(3, 5);
echo $string; // lo wo
```

## replace
Replace all occurrences of a string.

```php
$string = 'The quick brown fox jumps';
$string = SM::sub($string, 'fox', 'dog');
// or
$string = SM::make($string)
    ->sub('fox', 'dog');
echo $string; // The quick brown dog jumps

// case insensitive:
$string = 'The quick brown Fox jumps';
$string = SM::sub($string, 'fox', 'Dog');
// or
$string = SM::make($string)
    ->sub('fox', 'Dog');
echo $string; // The quick brown Dog jumps
```


## toBase64
Encode to base64

```php
$string = 'Hello world';
$string = SM::toBase64($string);
// or
$string = SM::make($string)
    ->toBase64();
echo $string; // SGVsbG8gd29ybGQ=
```

## toLower
Morph to lower case.

```php
$string = 'HeLlO wOrLd';
$string = SM::toLower($string);
// or
$string = SM::make($string)
    ->toLower();
echo $string; // hello world
```

## toUpper
Morph to upper case.

```php
$string = 'HeLlO wOrLd';
$string = SM::toUpper($string);
// or
$string = SM::make($string)
    ->toUpper();
echo $string; // HELLO WORLD
```

## withoutSpaces
Remove all spaces

```php
$string = 'Hello world';
$string = SM::withoutSpaces($string);
// or
$string = SM::make($string)
    ->withoutSpaces();
echo $string; // Helloworld
```
