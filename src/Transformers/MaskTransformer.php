<?php

namespace SSolWEB\StringMorpher\Transformers;

use SSolWEB\StringMorpher\Contracts\StringTransformerInterface;

/**
 * MaskTransformer
 *
 * Masks a string using a mask pattern and regex mapping.
 *
 * Default mapping:
 *   '0' => '[0-9]'
 *   'A' => '[A-Za-z]'
 *   'S' => '[A-Za-z0-9]'
 *
 * Custom mapping can be provided as an associative array.
 */
class MaskTransformer implements StringTransformerInterface
{
    /**
     * @var array $defaltMap Default mapping for mask characters.
     */
    protected $defaultMap = [
        '0' => '[0-9]',
        'A' => '[A-Za-z]',
        'S' => '[A-Za-z0-9]'
    ];

    /**
     * @param string $input The string to transform.
     * @param mixed ...$args Arguments: [0] => string $maskPattern, [1] => array $customMap.
     * @return string The string with regex replacements.
     */
    public function transform(string $input, mixed ...$args): string
    {
        /** @var string $maskPattern the mask pattern provided */
        $maskPattern = is_string($args[0]) ?
            $args[0] : throw new \InvalidArgumentException('Mask pattern has to be string.');
        /** @var array $customMap the custom mapping provided */
        $customMap = $args[1] ?? [];
        $this->validateCustomMap($customMap);
        /** @var array $map custom mapping */
        $map = array_merge($this->defaultMap, $customMap);
        /** @var string $pattern the regex pattern builded */
        $pattern = '';
        /** @var string $replacement the replacement pattern builded */
        $replacement = '';
        $maskPatternCount = 1;
        // Build regex pattern and replacement from mask
        for ($i = 0; $i < strlen($maskPattern); $i++) {
            $char = $maskPattern[$i];
            if (isset($map[$char])) {
                $pattern .= '(' . $map[$char] . ')';
                $replacement .= '$' . ($maskPatternCount++);
            } else {
                $replacement .= $char;
            }
        }

        return preg_replace('/^' . $pattern . '$/', $replacement, $input);
    }

    /**
     * Validates the custom map for mask transformation.
     * @throws \InvalidArgumentException If the custom map is not an array or has invalid keys.
     * @param array|null $customMap The custom mapping to validate.
     * @return void
     */
    protected function validateCustomMap(array|null $customMap): void
    {
        if ($customMap !== null && ! is_array($customMap)) {
            throw new \InvalidArgumentException('Custom map has to be an array if provided.');
        }
        foreach ($customMap as $key => $value) {
            if (strlen($key) !== 1) {
                throw new \InvalidArgumentException('Mask mapping keys must be single characters.');
            }
        }
    }
}
