---
title: "slugify"
parent: Methods
nav_order:
---

# slugify

This method converts the string into a URL- and file-safe slug. It normalizes characters by stripping accents, converts everything to lowercase, replaces all non-alphanumeric characters with a given separator (defaulting to `-`), collapses multiple consecutive separators, and trims the separators from the start and end of the string.

It behaves similarly to `toKebabCase`, but is much stricter and designed for creating safe identifiers, making it ideal for URLs, file names, user handles, database keys, and SEO purposes.

## Usage

```php
$string = 'Olá mundo, como vai?';
$string = SM::slugify($string);
// or
$string = SM::make($string)
    ->slugify();
echo $string; // ola-mundo-como-vai
```

### With a Custom Separator

You can optionally provide a custom separator to be used instead of a hyphen.

```php
$string = 'Olá mundo, como vai?';
$string = SM::slugify($string, '_');
// or
$string = SM::make($string)
    ->slugify('_');
echo $string; // ola_mundo_como_vai
```
