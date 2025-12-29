<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to flatcase.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToFlatCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to flatcase.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The flatcase string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $str = preg_replace('/[A-Z]/', '$0', $input);
        $str = strtolower($str);
        $str = preg_replace('/[\s_\-\.]+/', '', $str);
        return $str;
    }
}
