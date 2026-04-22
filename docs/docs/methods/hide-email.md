---
title: "hideEmail"
parent: Methods
nav_order:
---

# hideEmail

Masks an email address for privacy by keeping a visible prefix and replacing the remaining characters with `*`.

## Behavior
- Local part (before `@`): keeps the first 2 characters and masks the rest.
- Domain host (between `@` and first `.`): keeps the first 2 characters and masks the rest.
- Invalid email strings are returned unchanged.

## Usage

```php
$email = 'joao.silva@example.com';

$result = SM::hideEmail($email);
// or
$result = SM::make($email)
    ->hideEmail();

echo $result; // jo********@ex*****.com
```

## Examples

```php
echo SM::hideEmail('joana@gmail.com');
// jo***@gm***.com

echo SM::hideEmail('alice@contoso.co.uk');
// al***@co*****.co.uk

echo SM::hideEmail('a@x.io');
// a*@x*.io

echo SM::hideEmail('not-an-email');
// not-an-email
```
