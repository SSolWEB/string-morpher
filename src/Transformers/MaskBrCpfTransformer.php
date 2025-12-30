<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for Brazilian CPF masking.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class MaskBrCpfTransformer implements StringTransformerInterface
{
    /**
     * Apply Brazilian CPF mask.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);
        if (strlen($onlyNumbers) !== 11) {
            return $input;
        }
        return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4', $onlyNumbers);
    }
}
