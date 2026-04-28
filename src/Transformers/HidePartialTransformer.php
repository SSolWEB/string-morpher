<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

final class HidePartialTransformer implements StringTransformerInterface
{
    /**
     * Masks the middle of $input while keeping a configurable prefix and suffix visible.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => int $prefix (default 0), [1] => int $suffix (default 0),
     *                       [2] => string $maskChar (default '*').
     * @return string The string with the middle masked, or the input unchanged when too short.
     * @throws \InvalidArgumentException When prefix/suffix are not non-negative integers,
     *                                   or $maskChar is not a single character.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $prefix = $args[0] ?? 0;
        $suffix = $args[1] ?? 0;
        $maskChar = $args[2] ?? '*';

        if (! is_int($prefix) || ! is_int($suffix)) {
            throw new \InvalidArgumentException('Prefix and suffix lengths must be integers.');
        }

        if ($prefix < 0 || $suffix < 0) {
            throw new \InvalidArgumentException('Prefix and suffix lengths must be non-negative.');
        }

        if (! is_string($maskChar) || mb_strlen($maskChar) !== 1) {
            throw new \InvalidArgumentException('Mask char must be a single character string.');
        }

        $length = mb_strlen($input);
        if ($length === 0) {
            return $input;
        }

        if ($prefix + $suffix >= $length) {
            return $input;
        }

        $head = mb_substr($input, 0, $prefix);
        $tail = $suffix > 0 ? mb_substr($input, -$suffix) : '';
        $middleLength = $length - $prefix - $suffix;

        return $head . str_repeat($maskChar, $middleLength) . $tail;
    }
}
