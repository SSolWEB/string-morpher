---
title: "Methods"
layout: default
nav_order: 3
---

# Methods

Documentation of methods

The String Morpher library is designed with a focus on simplicity and efficiency, allowing developers to chain multiple methods in a seamless and readable manner. This makes it easy to perform complex string manipulations in a single flow.

## onlyNumbers
Only keep numbers

```php
$string = StringMorpher::onlyNumbers($string);
$string = StringMorpher::withoutSpaces($string)
    ->onlyNumbers();
```

## onlyAlpha
Only keep letters

```php
$string = StringMorpher::onlyAlpha($string);
$string = StringMorpher::withoutSpaces($string)
    ->onlyAlpha();
```

## withoutSpaces
Remove all spaces

```php
$string = StringMorpher::withoutSpaces($string);
$string = StringMorpher::capitalize($string)
    ->withoutSpaces();
```

## capitalize
Capitalize each word

```php
$string = StringMorpher::capitalize($string);
$string = StringMorpher::withoutSpaces($string)
    ->capitalize();
```

## maskBrCep
Apply the Brazilian CEP mask

```php
$string = StringMorpher::maskBrCep($string);
$string = StringMorpher::withoutSpaces($string)
    ->maskBrCep();
```

## maskBrCpf
Apply the Brazilian CEP mask

```php
$string = StringMorpher::maskBrCpf($string);
$string = StringMorpher::withoutSpaces($string)
    ->maskBrCpf();
```

## maskBrCnpj
Apply the Brazilian CNPJ mask

```php
$string = StringMorpher::maskBrCnpj($string);
$string = StringMorpher::withoutSpaces($string)
    ->maskBrCnpj();
```

## maskBrPhone
Apply the Brazilian Phone mask

```php
$string = StringMorpher::maskBrPhone($string);
$string = StringMorpher::withoutSpaces($string)
    ->maskBrPhone();
```
