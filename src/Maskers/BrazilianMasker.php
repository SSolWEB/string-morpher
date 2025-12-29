<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers;

trait BrazilianMasker
{
    /**
     * Mask a CEP postal number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrCep(string $string): string
    {
        return preg_replace('/^(\d{2})(\d{3})(\d)/', '\1.\2-\3', $string);
    }

    /**
     * Mask a CPF number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrCpf(string $string): string
    {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $string);
    }

    /**
     * Mask a CNPJ number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrCnpj(string $string): string
    {
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $string);
    }

    /**
     * Mask a phone number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrPhone(string $string): string
    {
        return preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $string);
    }

    /**
     * Mask to a real currency.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrReal(string $string): string
    {
        if (empty($string)) {
            return $string;
        }
        $aux = $string;
        if (strpos($aux, ',') !== false && strpos($aux, '.') === false) {
            $aux = str_replace(',', '.', $aux);
        }
        $aux = floatval($aux);
        $aux = number_format($aux, 2, ',', '.');
        return 'R$ ' . $aux;
    }
}
