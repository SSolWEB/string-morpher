<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;
use SSolWEB\StringMorpher\Maskers\Brazilian\RealMasker;

/**
 * Transformer for Brazilian Real currency masking.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class MaskBrRealTransformer implements StringTransformerInterface
{
    /**
     * Apply Brazilian Real currency mask.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The masked string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return (new RealMasker())->mask($input);
    }
}
