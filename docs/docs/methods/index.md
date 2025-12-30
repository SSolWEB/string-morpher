---
title: "Methods"
nav_order: 3
has_children: true
---

# Methods

The String Morpher library is designed with a focus on simplicity and efficiency, allowing developers to chain multiple methods in a seamless and readable manner. This makes it easy to perform complex string manipulations in a single flow.

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

## Available Methods
