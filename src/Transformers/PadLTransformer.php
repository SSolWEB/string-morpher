<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for padding strings on the left.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class PadLTransformer implements StringTransformerInterface
{
    /**
     * Pad string on the left.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => int $length, [1] => string $padChar (optional).
     * @return string The padded string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $length = $args[0] ?? 0;
        $padChar = $args[1] ?? ' ';
        return str_pad($input, $length, $padChar, STR_PAD_LEFT);
    }
}
