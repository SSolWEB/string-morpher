<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for removing all spaces.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class WithoutSpacesTransformer implements StringTransformerInterface
{
    /**
     * Remove all spaces from string.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The string without spaces.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return str_replace(' ', '', $input);
    }
}
