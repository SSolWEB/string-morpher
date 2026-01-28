<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for extracting only alphabetic characters.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class OnlyAlphaTransformer implements StringTransformerInterface
{
    /**
     * Remove all characters except letters.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The string with only letters.
     */
    public function transform(string $input, array $args = []): string
    {
        return preg_replace('/[^a-zA-Z]/', '', $input);
    }
}
