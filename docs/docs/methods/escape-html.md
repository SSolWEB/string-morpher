---
title: "escapeHtml"
parent: Methods
nav_order:
---

# escapeHtml

Escapes HTML special characters to their corresponding entities to prevent HTML injection while preserving UTF-8.

## Behavior
- Converts `<`, `>`, `&`, `\"`, `'` and other special characters to HTML entities.
- Uses `ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE` with `UTF-8` to avoid corrupting multibyte text and to substitute invalid bytes.
- Escapes quotes for attribute contexts; suitable for both element content and attribute values.
- Multibyte-safe and suitable for HTML contexts.

## Usage

```php
echo SM::escapeHtml('<script>alert("XSS")</script>');
// &lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;

echo SM::make('  <b>hello</b>  ')
    ->trim()
    ->escapeHtml();
// &lt;b&gt;hello&lt;/b&gt;
```

## Examples

```php
$title = 'Click "here" & learn';
echo (string)SM::escapeHtml($title);
// Click &quot;here&quot; &amp; learn

echo SM::escapeHtml(null);
// '' (empty string)

echo SM::escapeHtml('Café Münster <em>x</em>');
// Café Münster &lt;em&gt;x&lt;/em&gt;
```

## Technical notes
- Implementation uses `htmlspecialchars($input, ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE, 'UTF-8')`.
- Designed to preserve UTF-8 text and avoid breaking accented characters.
