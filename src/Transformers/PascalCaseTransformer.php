<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to PascalCase.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class PascalCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to PascalCase.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The PascalCase string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $str = str_replace(['-', '_'], ' ', $input);
        $str = ucwords($str);
        return str_replace(' ', '', $str);
    }
}
