# String Morpher, A powerful string manipulation library

String Morpher offers a fluent API, specifically designed for string manipulation, allowing developers to chain multiple methods in a seamless and readable manner. This makes it easy to perform complex string manipulations in a single and concise flow without the need for auxiliary functions or manual manipulation.

## Status

[![Build Status](https://github.com/SSolWEB/string-morpher/actions/workflows/on-push-main.yml/badge.svg)](https://github.com/SSolWEB/string-morpher/actions/workflows/on-push-main.yml)
[![Packagist Version](https://img.shields.io/packagist/v/ssolweb/string-morpher)](https://packagist.org/packages/ssolweb/string-morpher)
[![Packagist License](https://img.shields.io/packagist/l/ssolweb/string-morpher)](https://packagist.org/packages/ssolweb/string-morpher)

## Documentation
To see how to use and more details visit: [documentation](https://ssolweb.github.io/string-morpher)

You can start installing:

`composer require ssolweb/string-morpher`

Use:

```php
use SSolWEB\StringMorpher\StringMorpher as SM;

// you can chain methods
$string = SM::make($string)
    ->trim()
    ->replace('fox', 'dog')
    ->sub(5, 20)
    ->toLower();

$captalizedAlpha = SM::onlyAlpha($string)
    ->captalize();

$pascalCase = SM::captalize($string)
    ->withoutSpaces();

// and use like a string
echo $string;
echo $captalizedAlpha;
$json = json_encode(['data' => $pascalCase]);

// or return string primitive string value
echo $string->getString();
```

## Contributing
Please see the [contributing](https://ssolweb.github.io/string-morpher/docs/contributing/) entry for more details.

## Credits
[Vinicius de Santana](https://github.com/viniciusvts)

## License
The package is open source software licensed under the [MIT LICENSE](https://ssolweb.github.io/string-morpher/docs/license/).