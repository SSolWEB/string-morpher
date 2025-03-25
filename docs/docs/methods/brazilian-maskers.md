---
title: Brazilian Maskers
parent: Methods
nav_order: 3
---

# Brazilian Masks
{: .no_toc }

1. TOC
{:toc}

## maskBrCep
Apply the Brazilian CEP mask

```php
$string = '44555666';
$string = SM::maskBrCep($string);
// or
$string = SM::withoutSpaces($string)
    ->maskBrCep();
echo $string // 44.555-666
```

## maskBrCpf
Apply the Brazilian CEP mask

```php
$string = '11122233344';
$string = SM::maskBrCpf($string);
// or
$string = SM::withoutSpaces($string)
    ->maskBrCpf();
echo $string // 111.222.333-44
```

## maskBrCnpj
Apply the Brazilian CNPJ mask

```php
$string = '11222333444455';
$string = SM::maskBrCnpj($string);
// or
$string = SM::withoutSpaces($string)
    ->maskBrCnpj();
echo $string // 11.222.333/4444-55
```

## maskBrPhone
Apply the Brazilian Phone mask

```php
$string = '11988887777';
$string = SM::maskBrPhone($string);
// or
$string = SM::withoutSpaces($string)
    ->maskBrPhone();
echo $string // (11) 98888-7777
```

## maskBrReal
Apply the Brazilian Phone mask

```php
$string = '1234864.20'; // or float or int
$string = SM::maskBrReal($string);
// or
$string = SM::withoutSpaces($string)
    ->maskBrReal();
echo $string // R$ 1.234.864,20
```
