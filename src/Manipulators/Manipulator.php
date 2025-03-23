<?php

namespace SSolWEB\StringMorpher\Manipulators;

trait Manipulator
{
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
     * Remove all characters except letters.
     * @return $this
     */
    public function onlyAlpha()
    {
        $this->string = preg_replace('/[^a-zA-Z]/', '', $this->string);

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

    /**
     * Capitalize the first letter of each word.
     * @return $this
     */
    public function capitalize()
    {
        $this->string = ucwords(strtolower($this->string));

        return $this;
    }
}
