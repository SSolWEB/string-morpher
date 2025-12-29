<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to snake_case.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class SnakeCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to snake_case.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The snake_case string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $str = preg_replace('/[A-Z]/', '_$0', $input);
        $str = strtolower($str);
        $str = preg_replace('/[\s\-]+/', '_', $str);
        $str = preg_replace('/_{2,}/', '_', $str);
        return trim($str, '_');
    }
}
