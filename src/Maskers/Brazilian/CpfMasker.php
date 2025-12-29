<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers\Brazilian;

use SSolWEB\StringMorpher\Contracts\MaskerInterface;

/**
 * Masker for Brazilian CPF (individual taxpayer registry).
 *
 * Formats: 12345678901 -> 123.456.789-01
 *
 * @package SSolWEB\StringMorpher\Maskers\Brazilian
 */
final class CpfMasker implements MaskerInterface
{
    /**
     * Apply CPF mask to the input string.
     *
     * @param string $input The string to mask (expects 11 digits).
     * @return string The masked CPF string.
     */
    public function mask(string $input): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);

        if (strlen($onlyNumbers) !== 11) {
            return $input;
        }

        return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4', $onlyNumbers);
    }
}
