<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Instances;

use JsonSerializable;
use Stringable;

/**
 * String Morpher Instance with dynamic transformer loading.
 *
 * This class dynamically loads transformers based on method names.
 * For example, calling sub() will load SubTransformer, toLower() will load ToLowerTransformer.
 *
 * @package SSolWEB\StringMorpher\Instances
 */
class StringMorpherInstance implements Stringable, JsonSerializable
{
    private string $string;

    /**
     * Creates a new instance of StringMorpherInstance.
     * @param string $string The string to be morphed.
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * Dynamically loads and executes a transformer based on method name.
     *
     * @param string $method The method name to convert to transformer class.
     * @param array $args The arguments to pass to the transformer.
     * @return StringMorpherInstance
     */
    public function __call(string $method, array $args): StringMorpherInstance
    {
        // Convert method name to transformer class name
        // Examples: sub -> SubTransformer, toLower -> ToLowerTransformer, maskBrCep -> MaskBrCepTransformer
        $transformerName = $this->methodToTransformerName($method);

        // Try to load transformer
        $className = 'SSolWEB\\StringMorpher\\Transformers\\' . $transformerName;

        if (class_exists($className)) {
            $transformer = new $className();
            $this->string = $transformer->transform($this->string, ...$args);
            return $this;
        }

        // If transformer doesn't exist, throw exception
        throw new \BadMethodCallException(
            "Method {$method} does not exist. Expected transformer class: {$className}"
        );
    }

    /**
     * Convert method name to transformer class name.
     *
     * @param string $method The method name.
     * @return string The transformer class name (without 'Transformer' suffix).
     */
    private function methodToTransformerName(string $method): string
    {
        // Convert camelCase/PascalCase method to PascalCase class name
        // Examples:
        // - sub -> Sub
        // - toLower -> ToLower
        // - maskBrCep -> MaskBrCep
        // - toCamelCase -> ToCamelCase

        return ucfirst($method) . 'Transformer';
    }

    /** {@inheritDoc} */
    public function __toString(): string
    {
        return $this->string;
    }

    /**
     * return the actual string.
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): mixed
    {
        return $this->string;
    }
}
