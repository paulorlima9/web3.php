<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) NEXUniverse <info@nexuniverse.com.br>
 * 
 * @author Paulo R. Lima <paulorlima333@gmail.com>
 * @license MIT
 */

namespace Web3\Formatters;

interface IFormatter
{
    /**
     * format
     * 
     * @param mixed $value
     * @return string
     */
    public static function format($value);
}