---
title: "encodeUrl"
parent: Methods
nav_order:
---

# encodeUrl

This method encodes a string for safe use in URLs using RFC 3986 via PHP's `rawurlencode()`.

It percent-encodes all characters except `A-Z a-z 0-9 - _ . ~`, encodes spaces as `%20`, and correctly handles UTF-8 multibyte characters.

## Usage

```php
$query = 'Love & PHP';
$query = SM::encodeUrl($query);
// or
$query = SM::make($query)
    ->encodeUrl();

echo $query; // Love%20%26%20PHP
```

## More examples

```php
echo SM::encodeUrl('user@example.com');
// user%40example.com

echo SM::encodeUrl('Hello World!  #test');
// Hello%20World%21%20%20%23test

echo SM::encodeUrl('Café Münster');
// Caf%C3%A9%20M%C3%BCnster

// Multi-step URL building for complex APIs
$endpoint = SM::make('/api')
    ->append('/v1/users/')
    ->append(SM::make($email)->encodeUrl())
    ->append('/posts/')
    ->append(SM::make($postSlug)->encodeUrl());
```
