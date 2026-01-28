<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to UPPER_SNAKE_CASE.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToUpperSnakeCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to UPPER_SNAKE_CASE.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The UPPER_SNAKE_CASE string.
     */
    public function transform(string $input, array $args = []): string
    {
        $snakeCase = (new ToSnakeCaseTransformer())->transform($input);
        return strtoupper($snakeCase);
    }
}
