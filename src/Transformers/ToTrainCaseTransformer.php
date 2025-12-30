<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to Train-Case.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class ToTrainCaseTransformer implements StringTransformerInterface
{
    /**
     * Convert string to Train-Case.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The Train-Case string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $str = preg_replace('/[A-Z]/', '-$0', $input);
        $str = strtolower($str);
        $str = preg_replace('/[\s_]+/', '-', $str);
        $str = preg_replace('/-{2,}/', '-', $str);
        $str = trim($str, '-');
        $str = ucwords($str, '-');
        return $str;
    }
}
