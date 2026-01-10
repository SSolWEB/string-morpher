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
     * @since 1.1.1 Accepts new alphanumeric format.
     * @return string The masked string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        // Remove tudo que não for letra ou número
        $alnum = preg_replace('/[^A-Za-z0-9]/', '', $input);
        if (strlen($alnum) !== 14) {
            return $input;
        }
        return preg_replace('/^(\w{2})(\w{3})(\w{3})(\w{4})(\w{2})$/', '$1.$2.$3/$4-$5', $alnum);
    }
}
