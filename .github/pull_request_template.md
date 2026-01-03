## 📝 Description

Brief description of the changes implemented in this PR.

Closes #[issue_number]

## 🎯 Type of Change

- [ ] 🐛 Bug fix
- [ ] ✨ New feature
- [ ] 🔧 Enhancement (improvement of existing feature)
- [ ] 📝 Chore (documentation, refactoring, etc)

## ✅ Implementation Checklist

### Code
- [ ] Transformer created in `src/Transformers/` implementing `StringTransformerInterface`
- [ ] PHPDoc `@method` added in `src/StringMorpher.php`
- [ ] PHPDoc `@method` added in `src/Instances/StringMorpherInstance.php`

### Tests
- [ ] Tests created in `tests/Transformers/`
- [ ] Tests cover main use cases
- [ ] Tests cover edge cases (null, empty string, etc)
- [ ] All tests pass (`vendor/bin/phpunit`)

### Quality
- [ ] Code passes linter (`vendor/bin/phpcs`)
- [ ] Code follows project standards

### Documentation
- [ ] Method documented in `docs/docs/methods/`
- [ ] Usage examples included (static and fluent)
- [ ] Parameters and return values documented

## 💡 Usage Examples

### Static Usage
```php
use SSolWEB\StringMorpher\StringMorpher as SM;

$result = SM::methodName($input);
echo $result; // expected output
```

### Fluent Usage (Chainable)
```php
use SSolWEB\StringMorpher\StringMorpher as SM;

$result = SM::make($input)
    ->methodName()
    ->otherMethod();
    
echo $result; // expected output
```

## 🧪 How to Test

```bash
# Install dependencies
composer install

# Run tests
vendor/bin/phpunit

# Run linter
vendor/bin/phpcs
```

## 📸 Screenshots (if applicable)

[Add screenshots if there are visual changes in documentation]

## 📚 Related Documentation

- Issue: #[issue_number]
- Documentation: [link to docs if already published]
