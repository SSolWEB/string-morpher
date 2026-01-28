<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for appending a string to the input.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class AppendTransformer implements StringTransformerInterface
{
    /**
     * Append a string to the input.
     *
     * @param string $input The string to transform.
     * @param array $args Arguments: [0] => string $append The string to append.
     * @return string The string with the appended content.
     */
    public function transform(string $input, array $args = []): string
    {
        $append = $args[0] ?? '';
        return $input . $append;
    }
}
