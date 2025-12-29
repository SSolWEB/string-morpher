<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers\Brazilian;

use SSolWEB\StringMorpher\Contracts\MaskerInterface;

/**
 * Masker for Brazilian Real currency.
 *
 * Formats: 1234.56 -> R$ 1.234,56
 *
 * @package SSolWEB\StringMorpher\Maskers\Brazilian
 */
final class RealMasker implements MaskerInterface
{
    /**
     * Apply Real currency mask to the input string.
     *
     * @param string $input The string to mask (numeric value).
     * @return string The masked currency string.
     */
    public function mask(string $input): string
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
