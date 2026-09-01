<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for converting strings to a URL- and file-safe slug.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class SlugifyTransformer implements StringTransformerInterface
{
    /**
     * Convert string to a URL- and file-safe slug.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args The separator (default '-').
     * @return string The slugified string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $separator = (string) ($args[0] ?? '-');

        $transliteration = [
            'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'ç' => 'c',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ð' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
            'ñ' => 'n', 'š' => 's', 'ý' => 'y', 'ÿ' => 'y',
            'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'Ç' => 'C',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ñ' => 'N', 'Š' => 'S', 'Ý' => 'Y', 'Ÿ' => 'Y',
        ];

        // 1. Normalize (strip accents)
        $str = strtr($input, $transliteration);

        // 2. To lowercase
        $str = strtolower($str);

        // 3. Replace all non-alnum with separator
        $str = preg_replace('/[^a-z0-9]+/i', $separator, $str);

        // 4. Collapse multiple separators
        if ($separator !== '') {
            $separatorQuoted = preg_quote($separator, '/');
            $str = preg_replace('/' . $separatorQuoted . '{2,}/', $separator, $str);
        }

        // 5. Trim separators
        return trim($str, $separator);
    }
}
