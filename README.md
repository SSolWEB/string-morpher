# String Morpher, A powerful string manipulation library

String Morpher A powerful and versatile string manipulation library designed for developers who need efficient and intuitive solutions for modifying and masking strings.

## Status

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
```

## Contributing
Please see the [contributing](https://ssolweb.github.io/string-morpher/docs/contributing/) entry for more details.

## Credits
[Vinicius de Santana](https://github.com/viniciusvts)

## License
The package is open source software licensed under the [MIT LICENSE](https://ssolweb.github.io/string-morpher/docs/license/).