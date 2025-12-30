<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to kebab-case.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToKebabCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to kebab-case.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The kebab-case string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $str = preg_replace('/[A-Z]/', '-$0', $input);
        $str = strtolower($str);
        $str = preg_replace('/[\s_]+/', '-', $str);
        $str = preg_replace('/-{2,}/', '-', $str);
        return trim($str, '-');
    }
}
