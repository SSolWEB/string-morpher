# Mask

Masks a string using a mask pattern and regex mapping.

## Default Mapping
- `'0'` → `[0-9]`
- `'A'` → `[A-Za-z]`
- `'S'` → `[A-Za-z0-9]`

## Usage

```php
$string = '123ABC';
$string = SM::mask($string, '000-AAA');
// or
$string = SM::make($string)
    ->mask('000-AAA');
echo $result; // "123-ABC"
```

### Custom Mapping

```php
$result = SM::make('1a2b3c')
    ->mask(
        'S-S-S',
        ['S' => '[a-z][0-9]']
    );
echo $result; // "1a-2b-3c"
```

## Notes
- If custom mapping is provided, keys must be single characters.
