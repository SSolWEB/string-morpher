<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer for escaping special HTML characters to their entity equivalents.
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class EscapeHtmlTransformer implements StringTransformerInterface
{
    /**
     * Convert special characters to HTML entities for safe HTML output.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The HTML-escaped string.
     */
    public function transform(string $input, mixed ...$args): string
    {
        return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE, 'UTF-8');
    }
}
