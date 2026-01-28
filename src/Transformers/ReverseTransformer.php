<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for reversing strings.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ReverseTransformer implements StringTransformerInterface
{
    /**
     * Reverse the input string.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The reversed string.
     */
    public function transform(string $input, array $args = []): string
    {
        return strrev($input);
    }
}
