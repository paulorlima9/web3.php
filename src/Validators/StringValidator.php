<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) NEXUniverse <info@nexuniverse.com.br>
 * 
 * @author Paulo R. Lima <paulorlima333@gmail.com>
 * @license MIT
 */

namespace Web3\Validators;

use Web3\Validators\IValidator;

class StringValidator
{
    /**
     * validate
     *
     * @param string $value
     * @return bool
     */
    public static function validate($value)
    {
        return is_string($value);
    }
}