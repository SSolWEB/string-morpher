<?php

namespace SSolWEB\StringMorpher\Maskers;

trait BrazilianMasker
{
    /**
     * Mask a CEP postal number.
     * @return $this
     */
    public function maskBrCep()
    {
        $this->string = preg_replace('/^(\d{2})(\d{3})(\d)/', '\1.\2-\3', $this->string);


        return $this;
    }

    /**
     * Mask a CPF number.
     * @return $this
     */
    public function maskBrCpf()
    {
        $this->string = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $this->string);

        return $this;
    }

    /**
     * Mask a CNPJ number.
     * @return $this
     */
    public function maskBrCnpj()
    {
        $this->string = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $this->string);

        return $this;
    }

    /**
     * Mask a phone number.
     * @return $this
     */
    public function maskBrPhone()
    {
        $this->string = preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $this->string);

        return $this;
    }

    /**
     * Mask to a real currency.
     * @return $this
     */
    public function maskBrReal()
    {
        if (empty($this->string)) {
            return $this;
        }
        $aux = $this->string;
        if (strpos($aux, ',') !== false && strpos($aux, '.') === false) {
            $aux = str_replace(',', '.', $aux);
        }
        $aux = floatval($aux);
        $aux = number_format($aux, 2, ',', '.');
        $this->string = 'R$ ' . $aux;

        return $this;
    }
}
