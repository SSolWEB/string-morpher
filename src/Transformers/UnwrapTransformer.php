<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for removing a prefix/suffix pair from a string.
 */
final class UnwrapTransformer implements StringTransformerInterface
{
    /**
     * Removes a matching prefix and suffix from input.
     *
     * If suffix is not provided, it defaults to prefix.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => string|null $prefix, [1] => string|null $suffix.
     * @return string The unwrapped string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $prefix = (string)($args[0] ?? '');
        $suffix = array_key_exists(1, $args) ? (string)($args[1] ?? '') : $prefix;

        if ($prefix !== '' && str_starts_with($input, $prefix)) {
            $input = substr($input, strlen($prefix));
        }

        if ($suffix !== '' && str_ends_with($input, $suffix)) {
            $input = substr($input, 0, strlen($input) - strlen($suffix));
        }

        return $input;
    }
}
