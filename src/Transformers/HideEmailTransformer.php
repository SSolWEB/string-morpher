<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * Transformer that masks parts of an email address for privacy / compliance
 * (LGPD, GDPR). Keeps the first two characters of the local part and the
 * first two characters of the domain name; the TLD is preserved.
 *
 * Examples:
 *   joao.silva@example.com   -> jo********@ex*****.com
 *   j@x.io                   -> j@x*.io
 *   not-an-email             -> not-an-email  (returned unchanged)
 *
 * @package SSolWEB\StringMorpher\Transformers
 */
final class HideEmailTransformer implements StringTransformerInterface
{
    /**
     * Apply email masking.
     *
     * @param string $input The string to transform.
     * @param mixed ...$args Not used.
     * @return string The masked email, or the input unchanged if it doesn't
     *                parse as an email.
     */
    public function transform(string $input, mixed ...$args): string
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return $input;
        }

        $atPos = strrpos($input, '@');
        if ($atPos === false) {
            return $input;
        }

        $local = substr($input, 0, $atPos);
        $domain = substr($input, $atPos + 1);

        // Split on the FIRST dot so compound suffixes like `.co.uk` are
        // preserved in full. For `contoso.co.uk` this yields host="contoso"
        // and tld=".co.uk".
        $dotPos = strpos($domain, '.');
        if ($dotPos === false) {
            return $input;
        }

        $host = substr($domain, 0, $dotPos);
        $tld = substr($domain, $dotPos);

        return $this->mask($local) . '@' . $this->mask($host) . $tld;
    }

    /**
     * Mask a segment: keep the first two characters, replace the rest with `*`.
     * Shorter segments keep whatever prefix they have and add one star so the
     * mask is always visible.
     */
    private function mask(string $segment): string
    {
        $len = strlen($segment);
        if ($len <= 2) {
            return $segment . '*';
        }
        return substr($segment, 0, 2) . str_repeat('*', $len - 2);
    }
}
