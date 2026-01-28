<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to dot.case.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToDotCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to dot.case.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The dot.case string.
     */
    public function transform(string $input, array $args = []): string
    {
        $str = preg_replace('/[A-Z]/', '.$0', $input);
        $str = strtolower($str);
        $str = preg_replace('/[\s_\-]+/', '.', $str);
        $str = preg_replace('/\.{2,}/', '.', $str);
        return trim($str, '.');
    }
}
