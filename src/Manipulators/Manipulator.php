<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Manipulators;

trait Manipulator
{
    use TransformerLoader;

    /**
     * Capitalize the first letter of each word.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function capitalize(string $string): string
    {
        return ucwords(strtolower($string));
    }

    /**
     * Morph from base64.
     * @see base64_decode()
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function fromBase64(string $string): string
    {
        return $this->applyTransformer('Base64Decode', $string);
    }

    /**
     * Limit the string length.
     * If $end is setted, it will be added at the end.
     * If $length is less than the length of $end, $end will be the new string.
     * @param string $string The string that will be changed.
     * @param integer $length The maximum length.
     * @param string|null $end The string to be added at the end.
     * @return string
     */
    protected function limit(string $string, int $length, string|null $end = null): string
    {
        if (strlen($string) <= $length) {
            return $string;
        }
        $endLength = !is_null($end) ? strlen($end) : 0;
        $finalLength = ($length - $endLength < 0) ? 0 : $length - $endLength;
        return $endLength > 0 ?
            substr($string, 0, $finalLength) . $end :
            substr($string, 0, $finalLength);
    }

    /**
     * Remove all accents and special characters.
     * Only alphanumeric and spaces are preserved
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function normalize(string $string): string
    {
        return $this->applyTransformer('Normalize', $string);
    }

    /**
     * Remove all characters except letters.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function onlyAlpha(string $string): string
    {
        return preg_replace('/[^a-zA-Z]/', '', $string);
    }

    /**
     * Remove all characters except numbers.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function onlyNumbers(string $string): string
    {
        return preg_replace('/[^0-9]/', '', $string);
    }

    /**
     * Repeatedly add a character to the left of the string until the length is reached.
     * If the string is equal to or greater than the length, nothing is changed.
     * @see str_pad()
     * @param string $string The string that will be changed.
     * @param integer $length The length of the string.
     * @param string $padChar The character to be added.
     * @return string
     */
    protected function padL(string $string, int $length, string $padChar = ' '): string
    {
        return str_pad($string, $length, $padChar, STR_PAD_LEFT);
    }

    /**
     * Repeatedly add a character to the right of the string until the length is reached.
     * If the string is equal to or greater than the length, nothing is changed.
     * @see str_pad()
     * @param string $string The string that will be changed.
     * @param integer $length The length of the string.
     * @param string $padChar The character to be added.
     * @return string
     */
    protected function padR(string $string, int $length, string $padChar = ' '): string
    {
        return str_pad($string, $length, $padChar, STR_PAD_RIGHT);
    }

    /**
     * Replace all occurrences of a string.
     * @see str_replace()
     * @see str_ireplace()
     * @param string $string The string that will be changed.
     * @param array|string $needle The search string.
     * @param array|string $replace The replacement string.
     * @param boolean $caseSensitive If the search is case-sensitive.
     * @return string
     */
    protected function replace(
        string $string,
        array|string $needle,
        array|string $replace,
        bool $caseSensitive = true
    ): string {
        return $this->applyTransformer('Replace', $string, $needle, $replace, $caseSensitive);
    }

    /**
     * Replace all occurrences of a regex.
     * @see preg_replace()
     * @param string $string The string that will be changed.
     * @param array|string $needleRegex The search string.
     * @param array|string $replace The replacement string.
     * @return string
     */
    protected function replaceRegex(string $string, array|string $needleRegex, array|string $replace): string
    {
        return $this->applyTransformer('ReplaceRegex', $string, $needleRegex, $replace);
    }

    /**
     * Reverse the string.
     * @see strrev()
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function reverse(string $string): string
    {
        return $this->applyTransformer('Reverse', $string);
    }

    /**
     * Slice the string.
     * @see substr()
     * @param string $string The string that will be changed.
     * @param integer $offset The start position.
     * @param integer|null $length The length of the slice.
     * @return string
     */
    protected function sub(string $string, int $offset, int|null $length = null): string
    {
        return $this->applyTransformer('Sub', $string, $offset, $length);
    }

    /**
     * Morph to base64.
     * @see base64_encode()
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toBase64(string $string): string
    {
        return $this->applyTransformer('Base64Encode', $string);
    }

    /**
     * Morph to lower case.
     * @see mb_strtolower()
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toLower(string $string): string
    {
        return $this->applyTransformer('ToLower', $string);
    }

    /**
     * Morph to upper case.
     * @see mb_strtoupper()
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toUpper(string $string): string
    {
        return $this->applyTransformer('ToUpper', $string);
    }

    /**
     * Morph the first caracter to upper case.
     * @see ucfirst()
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function toUpperFirst(string $string): string
    {
        return ucfirst($string);
    }

    /**
     * Remove all spaces from the start and end.
     * @see trim()
     * @param string $string The string that will be changed.
     * @param string $characters The characters to be removed.
     * @return string
     */
    protected function trim(string $string, string $characters = " \n\r\t\v\0"): string
    {
        return $this->applyTransformer('Trim', $string, $characters);
    }

    /**
     * Remove all spaces from the left.
     * @see ltrim()
     * @param string $string The string that will be changed.
     * @param string $characters The characters to be removed.
     * @return string
     */
    protected function ltrim(string $string, string $characters = " \n\r\t\v\0"): string
    {
        return $characters == null ? ltrim($string) : ltrim($string, $characters);
    }

    /**
     * Remove all spaces from the right.
     * @see rtrim()
     * @param string $string The string that will be changed.
     * @param string $characters The characters to be removed.
     * @return string
     */
    protected function rtrim(string $string, string $characters = " \n\r\t\v\0"): string
    {
        return $characters == null ? rtrim($string) : rtrim($string, $characters);
    }

    /**
     * Remove all spaces.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function withoutSpaces(string $string): string
    {
        return str_replace(' ', '', $string);
    }
}
