<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Manipulators;

/**
 * Base trait for dynamic transformer loading.
 *
 * @package SSolWEB\StringMorpher\Manipulators
 */
trait TransformerLoader
{
    /**
     * Dynamically loads and executes a transformer.
     *
     * @param string $transformerName The transformer class name (e.g., 'Sub', 'ToLower').
     * @param string $input The input string.
     * @param mixed ...$args Additional arguments for the transformer.
     * @return string The transformed string.
     */
    private function applyTransformer(string $transformerName, string $input, mixed ...$args): string
    {
        $className = 'SSolWEB\\StringMorpher\\Transformers\\' . $transformerName . 'Transformer';
        if (class_exists($className)) {
            return (new $className())->transform($input, ...$args);
        }
        // Fallback to method if transformer doesn't exist
        return $input;
    }
}
