<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for wrapping a string with a prefix/suffix.
 */
final class WrapTransformer implements StringTransformerInterface
{
    /**
     * Wraps input with prefix and suffix.
     *
     * If suffix is not provided, it defaults to prefix.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => string|null $prefix, [1] => string|null $suffix.
     * @return string The wrapped string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $prefix = (string)($args[0] ?? '');
        $suffix = array_key_exists(1, $args) ? (string)($args[1] ?? '') : $prefix;

        return $prefix . $input . $suffix;
    }
}
