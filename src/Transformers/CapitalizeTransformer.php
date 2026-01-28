<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for capitalizing first letter of each word.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class CapitalizeTransformer implements StringTransformerInterface
{
    /**
     * Capitalize the first letter of each word.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The capitalized string.
     */
    public function transform(string $input, array $args = []): string
    {
        return ucwords(strtolower($input));
    }
}
