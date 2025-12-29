<?php

declare(strict_types=1);

namespace SSolWEB\StringMorpher\Maskers;

use SSolWEB\StringMorpher\Maskers\Brazilian\CepMasker;
use SSolWEB\StringMorpher\Maskers\Brazilian\CnpjMasker;
use SSolWEB\StringMorpher\Maskers\Brazilian\CpfMasker;
use SSolWEB\StringMorpher\Maskers\Brazilian\PhoneMasker;
use SSolWEB\StringMorpher\Maskers\Brazilian\RealMasker;

trait BrazilianMasker
{
    /**
     * Mask a CEP postal number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrCep(string $string): string
    {
        return (new CepMasker())->mask($string);
    }

    /**
     * Mask a CPF number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrCpf(string $string): string
    {
        return (new CpfMasker())->mask($string);
    }

    /**
     * Mask a CNPJ number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrCnpj(string $string): string
    {
        return (new CnpjMasker())->mask($string);
    }

    /**
     * Mask a phone number.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrPhone(string $string): string
    {
        return (new PhoneMasker())->mask($string);
    }

    /**
     * Mask to a real currency.
     * @param string $string The string that will be changed.
     * @return string
     */
    protected function maskBrReal(string $string): string
    {
        return (new RealMasker())->mask($string);
    }
}
