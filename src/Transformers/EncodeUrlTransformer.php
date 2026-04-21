<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for encoding strings to URL-safe format (RFC 3986).
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class EncodeUrlTransformer implements StringTransformerInterface
{
    /**
     * Encode string for safe URL usage using RFC 3986.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The URL-encoded string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return rawurlencode($input);
    }
}
