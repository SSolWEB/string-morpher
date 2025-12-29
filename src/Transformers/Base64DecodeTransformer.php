<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for decoding Base64 strings.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class Base64DecodeTransformer implements StringTransformerInterface
{
    /**
     * Decode Base64 string.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The decoded string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return base64_decode($input);
    }
}
