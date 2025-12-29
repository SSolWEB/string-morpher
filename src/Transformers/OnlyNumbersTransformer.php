<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for extracting only numeric characters.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class OnlyNumbersTransformer implements StringTransformerInterface
{
    /**
     * Remove all characters except numbers.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The string with only numbers.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return preg_replace('/[^0-9]/', '', $input);
    }
}
