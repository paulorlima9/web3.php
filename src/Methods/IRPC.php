<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) NEXUniverse <info@nexuniverse.com.br>
 * 
 * @author Paulo R. Lima <paulorlima333@gmail.com>
 * @license MIT
 */

namespace Web3\Methods;

interface IRPC
{
    /**
     * __toString
     * 
     * @return array
     */
    public function __toString();

    /**
     * toPayload
     * 
     * @return array
     */
    public function toPayload();
}