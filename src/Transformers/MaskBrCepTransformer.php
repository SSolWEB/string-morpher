<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;
use SSolWEB\StringMorpher\Maskers\Brazilian\CepMasker;

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
        return (new CepMasker())->mask($input);
    }
}
