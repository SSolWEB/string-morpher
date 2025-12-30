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

### String Manipulation
- [capitalize](capitalize.html) - Capitalizes the first letter of each word
- [fromBase64](from-base64.html) - Decodes a Base64-encoded string
- [limit](limit.html) - Limits the string to a specified length
- [normalize](normalize.html) - Removes accents and special characters
- [onlyAlpha](only-alpha.html) - Keeps only alphabetic letters
- [onlyNumbers](only-numbers.html) - Keeps only numeric digits
- [padL](pad-l.html) - Adds padding to the left
- [padR](pad-r.html) - Adds padding to the right
- [replace](replace.html) - Replaces all occurrences of a string
- [replaceRegex](replace-regex.html) - Replaces using regular expressions
- [reverse](reverse.html) - Reverses the string
- [sub](sub.html) - Extracts a substring
- [toBase64](to-base64.html) - Encodes to Base64
- [withoutSpaces](without-spaces.html) - Removes all spaces

### Case Conversion
- [toCamelCase](to-camel-case.html) - Converts to camelCase
- [toDotCase](to-dot-case.html) - Converts to dot.case
- [toFlatCase](to-flat-case.html) - Converts to flatcase
- [toKebabCase](to-kebab-case.html) - Converts to kebab-case
- [toLower](to-lower.html) - Converts to lowercase
- [toPascalCase](to-pascal-case.html) - Converts to PascalCase
- [toSnakeCase](to-snake-case.html) - Converts to snake_case
- [toTrainCase](to-train-case.html) - Converts to Train-Case
- [toUpper](to-upper.html) - Converts to uppercase
- [toUpperFirst](to-upper-first.html) - Capitalizes the first letter
- [toUpperSnakeCase](to-upper-snake-case.html) - Converts to UPPER_SNAKE_CASE

### Trimming
- [trim](trim.html) - Removes whitespace from both ends
- [ltrim](ltrim.html) - Removes whitespace from the beginning
- [rtrim](rtrim.html) - Removes whitespace from the end

### Brazilian Masks
- [maskBrCep](mask-br-cep.html) - Applies Brazilian CEP mask
- [maskBrCnpj](mask-br-cnpj.html) - Applies Brazilian CNPJ mask
- [maskBrCpf](mask-br-cpf.html) - Applies Brazilian CPF mask
- [maskBrPhone](mask-br-phone.html) - Applies Brazilian phone mask
- [maskBrReal](mask-br-real.html) - Applies Brazilian Real currency format