---
title: Case Manipulators
parent: Methods
nav_order: 4
---

# Case Manipulators
{: .no_toc }

1. TOC
{:toc}

## toCamelCase
Converts a string to camelCase.

```php
$string = 'example string case';
$string = SM::toCamelCase($string);
// or
$string = SM::make($string)
    ->toCamelCase();
echo $string; // exampleStringCase
```

## toPascalCase
Converts a string to PascalCase.

```php
$string = 'example string case';
$string = SM::toPascalCase($string);
// or
$string = SM::make($string)
    ->toPascalCase();
echo $string; // ExampleStringCase
```

## toSnakeCase
Converts a string to snake_case.

```php
$string = 'example string case';
$string = SM::toSnakeCase($string);
// or
$string = SM::make($string)
    ->toSnakeCase();
echo $string; // example_string_case
```

## toKebabCase
Converts a string to kebab-case.

```php
$string = 'example string case';
$string = SM::toKebabCase($string);
// or
$string = SM::make($string)
    ->toKebabCase();
echo $string; // example-string-case
```

## toUpperSnakeCase
Converts a string to UPPER_SNAKE_CASE.

```php
$string = 'example string case';
$string = SM::toUpperSnakeCase($string);
// or
$string = SM::make($string)
    ->toUpperSnakeCase();
echo $string; // EXAMPLE_STRING_CASE
```

## toTrainCase
Converts a string to Train-Case.

```php
$string = 'example string case';
$string = SM::toTrainCase($string);
// or
$string = SM::make($string)
    ->toTrainCase();
echo $string; // Example-String-Case
```

## toDotCase
Converts a string to dot.case.

```php
$string = 'example string case';
$string = SM::toDotCase($string);
// or
$string = SM::make($string)
    ->toDotCase();
echo $string; // example.string.case
```

## toFlatCase
Converts a string to flatcase.

```php
$string = 'example string case';
$string = SM::toFlatCase($string);
// or
$string = SM::make($string)
    ->toFlatCase();
echo $string; // examplestringcase
```