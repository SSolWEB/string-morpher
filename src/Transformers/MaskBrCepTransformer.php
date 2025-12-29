<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for Brazilian CEP masking.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class MaskBrCepTransformer implements StringTransformerInterface
{
    /**
     * Apply Brazilian CEP mask.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);
        if (strlen($onlyNumbers) !== 8) {
            return $input;
        }
        return preg_replace('/^(\d{2})(\d{3})(\d{3})$/', '$1.$2-$3', $onlyNumbers);
    }
}
