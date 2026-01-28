<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for encoding strings to Base64.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToBase64Transformer implements StringTransformerInterface
{
    /**
     * Encode string to Base64.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The Base64 encoded string.
     */
    public function transform(string $input, array $args = []): string
    {
        return base64_encode($input);
    }
}
