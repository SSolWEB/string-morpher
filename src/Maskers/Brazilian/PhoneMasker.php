<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers\Brazilian;

use SSolWEB\StringMorpher\Contracts\MaskerInterface;

/**
 * Masker for Brazilian phone numbers.
 *
 * Formats:
 * - 1112345678 -> (11) 1234-5678
 * - 11912345678 -> (11) 91234-5678
 *
 * @package SSolWEB\StringMorpher\Maskers\Brazilian
 */
final class PhoneMasker implements MaskerInterface
{
    /**
     * Apply phone mask to the input string.
     *
     * @param string $input The string to mask (expects 10 or 11 digits).
     * @return string The masked phone string.
     */
    public function mask(string $input): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);
        $length = strlen($onlyNumbers);

        if ($length < 10 || $length > 11) {
            return $input;
        }

        return preg_replace('/^(\d{2})(\d{4,5})(\d{4})$/', '($1) $2-$3', $onlyNumbers);
    }
}
