# Mask

Masks a string using a mask pattern and regex mapping.

## Usage

```php
$result = SM::make('123ABC')
    ->mask('000-AAA');
echo $result; // "123-ABC"
```

### Custom Mapping

```php
$result = SM::make('1a2b3c')
    ->mask('S-S-S', [
        'S' => '[a-z][0-9]'
    ]);
echo $result; // "1a-2b-3c"
```

## Parameters
- `maskPattern` (string): The mask pattern, e.g., `000-AAA`.
- `customMap` (array, optional): Custom mapping for mask characters. Keys must be single characters.

## Default Mapping
- `'0'` → `[0-9]`
- `'A'` → `[A-Za-z]`
- `'S'` → `[A-Za-z0-9]`

## Returns
A masked string according to the pattern.

## Notes
- If custom mapping is provided, keys must be single characters.
- Uses `preg_replace` for masking.
