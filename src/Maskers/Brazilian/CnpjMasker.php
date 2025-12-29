<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers\Brazilian;

use SSolWEB\StringMorpher\Contracts\MaskerInterface;

/**
 * Masker for Brazilian CNPJ (company taxpayer registry).
 *
 * Formats: 12345678000190 -> 12.345.678/0001-90
 *
 * @package SSolWEB\StringMorpher\Maskers\Brazilian
 */
final class CnpjMasker implements MaskerInterface
{
    /**
     * Apply CNPJ mask to the input string.
     *
     * @param string $input The string to mask (expects 14 digits).
     * @return string The masked CNPJ string.
     */
    public function mask(string $input): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);

        if (strlen($onlyNumbers) !== 14) {
            return $input;
        }

        return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $onlyNumbers);
    }
}
