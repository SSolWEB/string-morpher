<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for normalizing strings by removing accents and special characters.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class NormalizeTransformer implements StringTransformerInterface
{
    /**
     * Remove all accents and special characters, preserving only alphanumeric and spaces.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The normalized string.
     */
    public function transform(string $input, mixed ...$args): string
    {
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
        $result = strtr($input, $transliteration);
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $result);
    }
}
