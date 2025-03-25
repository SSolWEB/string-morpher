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
$string = SM::replace($string, 'fox', 'dog');
// or
$string = SM::make($string)
    ->replace('fox', 'dog');
echo $string; // The quick brown dog jumps

// case insensitive:
$string = 'The quick brown Fox jumps';
$string = SM::replace($string, 'fox', 'Dog', false);
// or
$string = SM::make($string)
    ->replace('fox', 'Dog', false);
echo $string; // The quick brown Dog jumps
```

## replaceRegex
Replace all occurrences of a regex.

```php
$string = 'The  quick   brown    fox jumps';
$string = SM::replaceRegex($string, '/\s+/', ' ');
// or
$string = SM::make($string)
    ->replaceRegex('/\s+/', ' ');
echo $string; // The quick brown fox jumps
```

## reverse
Reverse the string

```php
$string = 'spmuj xof nworb kciuq ehT';
$string = SM::reverse($string);
// or
$string = SM::make($string)
    ->reverse();
echo $string; // The quick brown fox jumps
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

## toUpperFirst
Morph to upper case the first letter of string.

```php
$string = 'hello world';
$string = SM::toUpperFirst($string);
// or
$string = SM::make($string)
    ->toUpperFirst();
echo $string; // Hello world
```

## trim
Remove all spaces from the start and end.

```php
$string = ' Hello world ';
$string = SM::trim($string);
// or
$string = SM::make($string)
    ->trim();
echo $string; // Hello world

// you can set what caracters you can trim
$string = SM::trim($string, " \n\r\t\v\0");
$string = SM::make($string)
    ->trim(" \n\r\t\v\0");
```

## ltrim
Remove all spaces from the start and end.

```php
$string = ' Hello world ';
$string = SM::ltrim($string);
// or
$string = SM::make($string)
    ->ltrim();
echo $string; // Hello world 

// you can set what caracters you can ltrim
$string = SM::ltrim($string, " \n\r\t\v\0");
$string = SM::make($string)
    ->ltrim(" \n\r\t\v\0");
```

## rtrim
Remove all spaces from the start and end.

```php
$string = ' Hello world ';
$string = SM::rtrim($string);
// or
$string = SM::make($string)
    ->rtrim();
echo $string; //  Hello world

// you can set what caracters you can rtrim
$string = SM::rtrim($string, " \n\r\t\v\0");
$string = SM::make($string)
    ->rtrim(" \n\r\t\v\0");
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
