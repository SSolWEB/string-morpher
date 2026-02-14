# StripTags

Removes all HTML and PHP tags from a string. Optionally allows certain tags (as in PHP's strip_tags).

## Usage

```php
$clean = SM::stripTags('<p>Paragraph</p><b>Bold</b>');
// Output: 'ParagraphBold'

$clean = SM::make('<p>Welcome</p><a href="#">here</a>')->stripTags();
// Output: 'Welcomehere'
```

## Parameters
- `allowedTags` (string, optional): Tags to allow, e.g., '<a><b>'.

```php
$clean = SM::stripTags('<p>Paragraph</p><b>Bold</b>', '<b>');
// Output: 'Paragraph<b>Bold</b>'

$clean = SM::make('<p>Welcome</p><a href="#">here</a>')->stripTags('<p>');
// Output: '<p>Welcome</p>here'
```

## Returns
A sanitized string with tags removed, except allowed tags.

## Notes
- Useful for sanitizing user input for display, emails, logs, or further transformations.
- Helps avoid XSS and rendering issues.
