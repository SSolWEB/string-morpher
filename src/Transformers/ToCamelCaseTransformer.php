<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to camelCase.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToCamelCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to camelCase.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The camelCase string.
     */
    public function transform(string $input, array $args = []): string
    {
        $str = str_replace(['-', '_'], ' ', $input);
        $str = ucwords($str);
        $str = str_replace(' ', '', $str);
        return lcfirst($str);
    }
}
