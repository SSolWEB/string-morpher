<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for Brazilian CNPJ masking.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class MaskBrCnpjTransformer implements StringTransformerInterface
{
    /**
     * Apply Brazilian CNPJ mask.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);
        if (strlen($onlyNumbers) !== 14) {
            return $input;
        }
        return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $onlyNumbers);
    }
}
