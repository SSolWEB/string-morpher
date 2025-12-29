<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers\Brazilian;

use SSolWEB\StringMorpher\Contracts\MaskerInterface;

/**
 * Masker for Brazilian CEP (postal code).
 *
 * Formats: 12345678 -> 12.345-678
 *
 * @package SSolWEB\StringMorpher\Maskers\Brazilian
 */
final class CepMasker implements MaskerInterface
{
    /**
     * Apply CEP mask to the input string.
     *
     * @param string $input The string to mask (expects 8 digits).
     * @return string The masked CEP string.
     */
    public function mask(string $input): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);

        if (strlen($onlyNumbers) !== 8) {
            return $input;
        }

        return preg_replace('/^(\d{2})(\d{3})(\d{3})$/', '$1.$2-$3', $onlyNumbers);
    }
}
