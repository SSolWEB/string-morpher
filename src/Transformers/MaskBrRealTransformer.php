<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for Brazilian Real currency masking.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class MaskBrRealTransformer implements StringTransformerInterface
{
    /**
     * Apply Brazilian Real currency mask.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, array $args = []): string
    {
        if (empty($input)) {
            return $input;
        }
        $value = $input;
        // Handle Brazilian decimal format (comma as decimal separator)
        if (strpos($value, ',') !== false && strpos($value, '.') === false) {
            $value = str_replace(',', '.', $value);
        }
        // Convert to float and format
        $floatValue = floatval($value);
        $formatted = number_format($floatValue, 2, ',', '.');
        return 'R$ ' . $formatted;
    }
}
