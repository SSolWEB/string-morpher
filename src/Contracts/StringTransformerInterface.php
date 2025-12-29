<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Contracts;

/**
 * Interface for string transformation operations.
 *
 * This interface defines a contract for all string transformers in the library.
 * Transformers can accept a variable number of arguments to support different
 * transformation requirements.
 *
 * @package SSolWEB\StringMorpher\Contracts
 */
interface StringTransformerInterface
{
    /**
     * Transform the input string using the provided arguments.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Additional arguments required for the transformation.
     * @return string The transformed string.
     */
    public function transform(string $input, mixed ...$args): string;
}
