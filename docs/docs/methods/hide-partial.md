---
title: "hidePartial"
parent: Methods
nav_order:
---

# hidePartial

Masks the middle of a string while keeping a configurable prefix and suffix visible.

## Parameters
- `int $prefix = 0` - number of leading characters to keep visible.
- `int $suffix = 0` - number of trailing characters to keep visible.
- `string $maskChar = '*'` - single character to repeat in place of the masked middle.

## Behavior
- Returns the input unchanged when the string is empty or shorter than `prefix + suffix`.
- Multibyte safe (operates on characters, not bytes).
- Throws `InvalidArgumentException` on negative lengths or a mask character that is not a single character.

## Usage

```php
$id = '1234567890';

$result = SM::hidePartial($id, 2, 2);
// or
$result = SM::make($id)
    ->hidePartial(2, 2);

echo $result; // 12******90
```

## Examples

```php
echo SM::hidePartial('1234567890', 2, 2);
// 12******90

echo SM::make('ABCDEFG')->hidePartial(1, 1);
// A*****G

echo SM::hidePartial('1234567890', 2, 2, '#');
// 12######90

echo SM::hidePartial('AB', 1, 1);
// AB  (prefix + suffix covers the whole string)
```
