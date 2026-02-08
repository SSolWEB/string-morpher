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
 *
 * @method StringMorpherInstance append(string $append)
 * @method StringMorpherInstance capitalize()
 * @method StringMorpherInstance fromBase64()
 * @method StringMorpherInstance limit(int $length, string|null $end = null)
 * @method StringMorpherInstance normalize()
 * @method StringMorpherInstance onlyAlpha()
 * @method StringMorpherInstance onlyNumbers()
 * @method StringMorpherInstance padL(int $length, string $padChar = ' ')
 * @method StringMorpherInstance padR(int $length, string $padChar = ' ')
 * @method StringMorpherInstance replace(array|string $needle, array|string $replace, bool $caseSensitive = true)
 * @method StringMorpherInstance replaceRegex(array|string $needleRegex, array|string $replace)
 * @method StringMorpherInstance reverse()
 * @method StringMorpherInstance sub(int $offset, int|null $length = null)
 * @method StringMorpherInstance toBase64()
 * @method StringMorpherInstance toLower()
 * @method StringMorpherInstance toUpper()
 * @method StringMorpherInstance toUpperFirst()
 * @method StringMorpherInstance trim(string $characters = " \n\r\t\v\0")
 * @method StringMorpherInstance ltrim(string $characters = " \n\r\t\v\0")
 * @method StringMorpherInstance rtrim(string $characters = " \n\r\t\v\0")
 * @method StringMorpherInstance withoutSpaces()
 * @method StringMorpherInstance prepend(string|null $prefix)
 * @method StringMorpherInstance toCamelCase()
 * @method StringMorpherInstance toPascalCase()
 * @method StringMorpherInstance toSnakeCase()
 * @method StringMorpherInstance toKebabCase()
 * @method StringMorpherInstance toUpperSnakeCase()
 * @method StringMorpherInstance toTrainCase()
 * @method StringMorpherInstance toDotCase()
 * @method StringMorpherInstance toFlatCase()
 * @method StringMorpherInstance mask(string $maskPattern, array $customMap = null)
 * @method StringMorpherInstance maskBrCep()
 * @method StringMorpherInstance maskBrCpf()
 * @method StringMorpherInstance maskBrCnpj()
 * @method StringMorpherInstance maskBrPhone()
 * @method StringMorpherInstance maskBrReal()
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
