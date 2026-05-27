---
title: "Introdução"
nav_order: 1
---

# String Morpher

String Morpher offers a fluent API, specifically designed for string manipulation, allowing developers to chain multiple methods in a seamless and readable manner. This makes it easy to perform complex string manipulations in a single and concise flow without the need for auxiliary functions or manual manipulation.

```php
use SSolWEB\StringMorpher\StringMorpher as SM; // Dont Forget to import the magic!

$formatedSentence = SM::make("   hello,   world!   ")
    ->replaceRegex('/\s+/', ' ')
    ->trim()
    ->toUpperFirst();
echo $formatedSentence; // Hello, world!

$username = SM::make('João da Silva Souza')
    ->normalize()
    ->onlyAlpha()
    ->toLower()
    ->limit(12);
echo $username; // joaodasilvaso
```

Start by reading the [instalation tutorial](/string-morpher/docs/installation/), then check the
list of available [methods](/string-morpher/docs/methods/) for more information.
