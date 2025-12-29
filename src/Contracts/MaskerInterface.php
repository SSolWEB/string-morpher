<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Contracts;

/**
 * Interface for string masking operations.
 *
 * This interface defines a contract for all maskers in the library.
 * Maskers are responsible for formatting strings according to specific patterns,
 * such as phone numbers, postal codes, currency, etc.
 *
 * @package SSolWEB\StringMorpher\Contracts
 */
interface MaskerInterface
{
    /**
     * Apply a mask to the input string.
     *
     * @param string $input The string to mask.
     * @return string The masked string.
     */
    public function mask(string $input): string;
}
