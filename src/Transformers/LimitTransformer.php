<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for limiting string length.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class LimitTransformer implements StringTransformerInterface
{
    /**
     * Limit the string length.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => int $length, [1] => string|null $end (optional).
     * @return string The limited string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $length = $args[0] ?? 100;
        $end = $args[1] ?? null;

        if (strlen($input) <= $length) {
            return $input;
        }

        $endLength = !is_null($end) ? strlen($end) : 0;
        $finalLength = ($length - $endLength < 0) ? 0 : $length - $endLength;

        return $endLength > 0
            ? substr($input, 0, $finalLength) . $end
            : substr($input, 0, $finalLength);
    }
}
