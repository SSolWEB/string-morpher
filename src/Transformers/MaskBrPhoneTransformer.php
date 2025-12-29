<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;
use SSolWEB\StringMorpher\Maskers\Brazilian\PhoneMasker;

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
     * @param mixed ...$args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return (new PhoneMasker())->mask($input);
    }
}
