---
title: "Contributing"
nav_order: 4
---

# Contributing
Contributions are always welcome, but to keep things organized, keep in mind the following rules.

## Bug Reports
When reporting a bug in the package, make sure you follow the rules:

- You have read the Installation and General Configuration sections of the documentation;
- The issue you're facing is not documented;
- A GitHub issue with the problem you're having doesn't already exist (in an open or closed state);

Failure to do so, will result in a closed ticket.

## Pull Requests
Fixing a bug, correcting a typo or adding a new feature?
feature?

- Add or fix the morpher logic in `src/Transformers/`
    - Implement the `StringTransformerInterface`.
    - Follow the main method pattern: `transform(string $input, mixed ...$args): string`.
- Update the Facade:
    - Add or edit a PHPDoc `@method` in:
        - `src/StringMorpher.php`
        - `src/Instances/StringMorpherInstance.php`
    - Follow the pattern for IDE autocompletion.
- Add or edit a section in `docs/docs/methods/` explaining the method.
- Add or edit a test in `tests/Transformers/`.

Just remember that all pull requests should be done against the `main` branch.

### Install, develop, test, contribute...

```bash
composer install
# do some magic
vendor/bin/phpcs
vendor/bin/phpunit
# commit
# make a pull request
```

## Repository
Visit the repository in [github](https://github.com/SSolWEB/string-morpher/)