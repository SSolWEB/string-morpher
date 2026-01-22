<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

class PrependTransformer implements StringTransformerInterface
{
    /**
     * Prepend a string to the input.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => string $append The string to prepend.
     * @return string
     */
    public function transform(string $input, mixed ...$args): string
    {
        $prefix = $args[0] ?? '';

        return (string)$prefix . $input;
    }
}
