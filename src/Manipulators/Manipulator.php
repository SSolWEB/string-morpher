<?php

namespace SSolWEB\StringMorpher\Manipulators;

trait Manipulator
{
    /**
     * Capitalize the first letter of each word.
     * @return $this
     */
    public function capitalize()
    {
        $this->string = ucwords(strtolower($this->string));

        return $this;
    }

    /**
     * Morph from base64.
     * @see base64_decode()
     * @return $this
     */
    public function fromBase64()
    {
        $this->string = base64_decode($this->string);

        return $this;
    }

    /**
     * Limit the string length.
     * If $end is setted, it will be added at the end.
     * If $length is less than the length of $end, $end will be the new string.
     * @param integer $length The maximum length.
     * @param string|null $end The string to be added at the end.
     * @return $this
     */
    public function limit(int $length, string|null $end = null)
    {
        if (strlen($this->string) <= $length) {
            return $this;
        }
        $endLength = !is_null($end) ? strlen($end) : 0;
        $finalLength = ($length - $endLength < 0) ? 0 : $length - $endLength;
        $this->string = $endLength > 0 ?
            substr($this->string, 0, $finalLength) . $end :
            substr($this->string, 0, $finalLength);

        return $this;
    }

    /**
     * Remove all accents and special characters.
     * Only alphanumeric and spaces are preserved
     * @return $this
     */
    public function normalize()
    {
        $transliteration = [
            'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'ç' => 'c',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ð' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
            'ñ' => 'n', 'š' => 's', 'ý' => 'y', 'ÿ' => 'y',
            'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'Ç' => 'C',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ñ' => 'N', 'Š' => 'S', 'Ý' => 'Y', 'Ÿ' => 'Y',
        ];
        $input = strtr($this->string, $transliteration);
        $this->string = preg_replace('/[^a-zA-Z0-9\s]/', '', $input);

        return $this;
    }

    /**
     * Remove all characters except letters.
     * @return $this
     */
    public function onlyAlpha()
    {
        $this->string = preg_replace('/[^a-zA-Z]/', '', $this->string);

        return $this;
    }

    /**
     * Remove all characters except numbers.
     * @return $this
     */
    public function onlyNumbers()
    {
        $this->string = preg_replace('/[^0-9]/', '', $this->string);

        return $this;
    }

    /**
     * Replace all occurrences of a string.
     * @see str_replace()
     * @see str_ireplace()
     * @param array|string $needle The search string.
     * @param array|string $replace The replacement string.
     * @param boolean $caseSensitive If the search is case-sensitive.
     * @return $this
     */
    public function replace(array|string $needle, array|string $replace, bool $caseSensitive = true)
    {
        $this->string = $caseSensitive
            ? str_replace($needle, $replace, $this->string)
            : str_ireplace($needle, $replace, $this->string);

        return $this;
    }

    /**
     * Replace all occurrences of a regex.
     * @see preg_replace()
     * @param array|string $needleRegex The search string.
     * @param array|string $replace The replacement string.
     * @return $this
     */
    public function replaceRegex(array|string $needleRegex, array|string $replace)
    {
        $this->string = preg_replace($needleRegex, $replace, $this->string);

        return $this;
    }

    /**
     * Reverse the string.
     * @see strrev()
     * @return $this
     */
    public function reverse()
    {
        $this->string = strrev($this->string);

        return $this;
    }

    /**
     * Slice the string.
     * @see substr()
     * @param integer $offset The start position.
     * @param integer|null $length The length of the slice.
     * @return $this
     */
    public function sub(int $offset, int $length = null)
    {
        $this->string = substr($this->string, $offset, $length);

        return $this;
    }

    /**
     * Morph to base64.
     * @see base64_encode()
     * @return $this
     */
    public function toBase64()
    {
        $this->string = base64_encode($this->string);

        return $this;
    }

    /**
     * Morph to lower case.
     * @see mb_strtolower()
     * @return $this
     */
    public function toLower()
    {
        $this->string = mb_strtolower($this->string, 'UTF-8');

        return $this;
    }

    /**
     * Morph to upper case.
     * @see mb_strtoupper()
     * @return $this
     */
    public function toUpper()
    {
        $this->string = mb_strtoupper($this->string, 'UTF-8');

        return $this;
    }

    /**
     * Morph the first caracter to upper case.
     * @see ucfirst()
     * @return $this
     */
    public function toUpperFirst()
    {
        $this->string = ucfirst($this->string);

        return $this;
    }

    /**
     * Remove all spaces from the start and end.
     * @see trim()
     * @param string $characters The characters to be removed.
     * @return $this
     */
    public function trim(string $characters = " \n\r\t\v\0")
    {
        $this->string = $characters == null ?
            trim($this->string) :
            trim($this->string, $characters);

        return $this;
    }

    /**
     * Remove all spaces from the left.
     * @see ltrim()
     * @param string $characters The characters to be removed.
     * @return $this
     */
    public function ltrim(string $characters = " \n\r\t\v\0")
    {
        $this->string = $characters == null ?
            ltrim($this->string) :
            ltrim($this->string, $characters);

        return $this;
    }

    /**
     * Remove all spaces from the right.
     * @see rtrim()
     * @param string $characters The characters to be removed.
     * @return $this
     */
    public function rtrim(string $characters = " \n\r\t\v\0")
    {
        $this->string = $characters == null ?
            rtrim($this->string) :
            rtrim($this->string, $characters);

        return $this;
    }

    /**
     * Remove all spaces.
     * @return $this
     */
    public function withoutSpaces()
    {
        $this->string = str_replace(' ', '', $this->string);

        return $this;
    }
}
