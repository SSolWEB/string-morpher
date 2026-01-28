<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for Brazilian phone masking.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class MaskBrPhoneTransformer implements StringTransformerInterface
{
    /**
     * Apply Brazilian phone mask.
     *
     * @param string $input The string to transform.
     * @param array $args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, array $args = []): string
    {
        $onlyNumbers = preg_replace('/[^0-9]/', '', $input);
        $length = strlen($onlyNumbers);
        if ($length < 10 || $length > 11) {
            return $input;
        }
        return preg_replace('/^(\d{2})(\d{4,5})(\d{4})$/', '($1) $2-$3', $onlyNumbers);
    }
}
