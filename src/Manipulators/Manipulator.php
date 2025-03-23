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
     * Remove all spaces.
     * @return $this
     */
    public function withoutSpaces()
    {
        $this->string = str_replace(' ', '', $this->string);

        return $this;
    }
}
