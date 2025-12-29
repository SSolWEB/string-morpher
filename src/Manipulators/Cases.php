<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Manipulators;

trait Cases
{
    use TransformerLoader;

    /**
     * Converte para camelCase.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toCamelCase(string $string): string
    {
        return $this->applyTransformer('CamelCase', $string);
    }

    /**
     * Converte para PascalCase.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toPascalCase(string $string): string
    {
        return $this->applyTransformer('PascalCase', $string);
    }

    /**
     * Converte para snake_case.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toSnakeCase(string $string): string
    {
        return $this->applyTransformer('SnakeCase', $string);
    }

    /**
     * Converte para kebab-case.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toKebabCase(string $string): string
    {
        return $this->applyTransformer('KebabCase', $string);
    }

    /**
     * Converte para UPPER_SNAKE_CASE.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toUpperSnakeCase(string $string): string
    {
        return strtoupper($this->toSnakeCase($string));
    }

    /**
     * Converte para Train-Case
     * @example Train-Case-Example
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toTrainCase(string $string): string
    {
        $str = preg_replace('/[A-Z]/', '-$0', $string);
        $str = strtolower($str);
        $str = preg_replace('/[\s_]+/', '-', $str);
        $str = preg_replace('/-{2,}/', '-', $str);
        $str = trim($str, '-');
        $str = ucwords($str, '-');
        return $str;
    }

    /**
     * Converte para dot.case
     * @example dot.case.example
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toDotCase(string $string): string
    {
        $str = preg_replace('/[A-Z]/', '.$0', $string);
        $str = strtolower($str);
        $str = preg_replace('/[\s_\-]+/', '.', $str);
        $str = preg_replace('/\.{2,}/', '.', $str);
        return trim($str, '.');
    }

    /**
     * Converte para flatcase
     * @example flatcaseexample
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toFlatCase(string $string): string
    {
        $str = preg_replace('/[A-Z]/', '$0', $string);
        $str = strtolower($str);
        $str = preg_replace('/[\s_\-\.]+/', '', $str);
        return $str;
    }
}
