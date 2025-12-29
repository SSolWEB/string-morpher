<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for trimming from the left.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class LtrimTransformer implements StringTransformerInterface
{
    /**
     * Trim characters from the left.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => string $characters (optional).
     * @return string The trimmed string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $characters = $args[0] ?? " \n\r\t\v\0";
        return $characters === null ? ltrim($input) : ltrim($input, $characters);
    }
}
