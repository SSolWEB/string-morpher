# Copilot Instructions for String Morpher

## Project Overview
- **String Morpher** is a PHP library for advanced, chainable string manipulation, focusing on readability and developer ergonomics.
- Core logic is in `src/Transformers/` (each file = one transformation, e.g., `ToDotCaseTransformer.php`).
- The main entry point is the static facade `SSolWEB\StringMorpher\StringMorpher` (see `src/StringMorpher.php`).
- Chaining is enabled via `StringMorpherInstance` (`src/Instances/StringMorpherInstance.php`), which dynamically loads transformers based on method names.

## Key Patterns & Conventions
- **Add new transformations:**
  1. Implement `StringTransformerInterface` (`src/Contracts/StringTransformerInterface.php`).
  2. Place the class in `src/Transformers/`.
  3. Add a PHPDoc `@method` to both `src/StringMorpher.php` and `src/Instances/StringMorpherInstance.php` for IDE autocompletion.
  4. Document the method in `docs/docs/methods/`.
  5. Add or update a test in `tests/Transformers/`.
- **All transformers** must implement `transform(string $input, mixed ...$args): string`.
- **Chaining:** All transformation methods return a `StringMorpherInstance` for further chaining.
- **Usage Example:**
  ```php
  $result = SM::make('  hello world  ')
      ->trim()
      ->replace('world', 'Copilot')
      ->toUpper();
  echo $result; // "HELLO COPILOT"
  ```
- **Tests:** Use PHPUnit. Place new tests in `tests/Transformers/`.

## Developer Workflows
- **Install dependencies:** `composer install`
- **Run tests:** `vendor/bin/phpunit`
- **Lint code:** `vendor/bin/phpcs`. Follow rules in `phpcs.xml`.
- **Add package:** `composer require vendor/package`
- **Document methods:** Add/modify markdown in `docs/docs/methods/`.

## Integration & External Dependencies
- Uses Composer for dependency management.
- No external services; all logic is local and stateless.

## Notable Files & Directories
- `src/Transformers/` — All transformation logic
- `src/StringMorpher.php` — Facade/static entry point
- `src/Instances/StringMorpherInstance.php` — Handles chaining and dynamic method resolution
- `src/Contracts/StringTransformerInterface.php` — Contract for all transformers
- `tests/Transformers/` — Unit tests for each transformer
- `docs/` — Jekyll with "just-the-docs" theme
- `docs/docs/methods/` — Method documentation

## Project-Specific Notes
- **Deprecated logic** is in `tests/Deprecated/` and should not be extended.
- All PRs should target the `main` branch.
- For more, see `CONTRIBUTING.md` and `docs/docs/contributing.md`.
