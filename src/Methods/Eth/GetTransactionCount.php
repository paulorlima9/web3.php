<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) NEXUniverse <info@nexuniverse.com.br>
 * 
 * @author Paulo R. Lima <paulorlima333@gmail.com>
 * @license MIT
 */

namespace Web3\Methods\Eth;

use InvalidArgumentException;
use Web3\Methods\EthMethod;
use Web3\Validators\TagValidator;
use Web3\Validators\QuantityValidator;
use Web3\Validators\AddressValidator;
use Web3\Formatters\AddressFormatter;
use Web3\Formatters\OptionalQuantityFormatter;
use Web3\Formatters\BigNumberFormatter;

class GetTransactionCount extends EthMethod
{
    /**
     * validators
     * 
     * @var array
     */
    protected $validators = [
        AddressValidator::class, [
            TagValidator::class, QuantityValidator::class
        ]
    ];

    /**
     * inputFormatters
     * 
     * @var array
     */
    protected $inputFormatters = [
        AddressFormatter::class, OptionalQuantityFormatter::class
    ];

    /**
     * outputFormatters
     * 
     * @var array
     */
    protected $outputFormatters = [
        BigNumberFormatter::class
    ];

    /**
     * defaultValues
     * 
     * @var array
     */
    protected $defaultValues = [
        1 => 'latest'
    ];

    /**
     * construct
     * 
     * @param string $method
     * @param array $arguments
     * @return void
     */
    // public function __construct($method='', $arguments=[])
    // {
    //     parent::__construct($method, $arguments);
    // }
}