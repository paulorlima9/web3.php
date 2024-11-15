# web3.php

[![Build Status](https://travis-ci.org/sc0Vu/web3.php.svg?branch=master)](https://travis-ci.org/sc0Vu/web3.php)
[![codecov](https://codecov.io/gh/sc0Vu/web3.php/branch/master/graph/badge.svg)](https://codecov.io/gh/sc0Vu/web3.php)
[![Join the chat at https://gitter.im/web3-php/web3.php](https://img.shields.io/badge/gitter-join%20chat-brightgreen.svg)](https://gitter.im/web3-php/web3.php)
[![Licensed under the MIT License](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/sc0Vu/web3.php/blob/master/LICENSE)


A php interface for interacting with the Ethereum blockchain and ecosystem.

# Install

Set minimum stability to dev
```
"minimum-stability": "dev"
```

Then
```
composer require paulorlima9/web3.php dev-master
```

Or you can add this line in composer.json

```
"paulorlima9/web3.php": "dev-master"
```


# Usage

### New instance
```php
use Web3\Web3;

$web3 = new Web3('http://localhost:8545');
```

### Using provider
```php
use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;

$web3 = new Web3(new HttpProvider(new HttpRequestManager('http://localhost:8545')));

// timeout
$web3 = new Web3(new HttpProvider(new HttpRequestManager('http://localhost:8545', 0.1)));
```

### You can use callback to each rpc call:
```php
$web3->clientVersion(function ($err, $version) {
    if ($err !== null) {
        // do something
        return;
    }
    if (isset($version)) {
        echo 'Client version: ' . $version;
    }
});
```

### Eth
```php
use Web3\Web3;

$web3 = new Web3('http://localhost:8545');
$eth = $web3->eth;
```

Or

```php
use Web3\Eth;

$eth = new Eth('http://localhost:8545');
```

### Net
```php
use Web3\Web3;

$web3 = new Web3('http://localhost:8545');
$net = $web3->net;
```

Or

```php
use Web3\Net;

$net = new Net('http://localhost:8545');
```

### Batch

web3
```php
$web3->batch(true);
$web3->clientVersion();
$web3->hash('0x1234');
$web3->execute(function ($err, $data) {
    if ($err !== null) {
        // do something
        // it may throw exception or array of exception depends on error type
        // connection error: throw exception
        // json rpc error: array of exception
        return;
    }
    // do something
});
```

eth

```php
$eth->batch(true);
$eth->protocolVersion();
$eth->syncing();

$eth->provider->execute(function ($err, $data) {
    if ($err !== null) {
        // do something
        return;
    }
    // do something
});
```

net
```php
$net->batch(true);
$net->version();
$net->listening();

$net->provider->execute(function ($err, $data) {
    if ($err !== null) {
        // do something
        return;
    }
    // do something
});
```

personal
```php
$personal->batch(true);
$personal->listAccounts();
$personal->newAccount('123456');

$personal->provider->execute(function ($err, $data) {
    if ($err !== null) {
        // do something
        return;
    }
    // do something
});
```

### Contract

```php
use Web3\Contract;

$contract = new Contract('http://localhost:8545', $abi);

// deploy contract
$contract->bytecode($bytecode)->new($params, $callback);

// call contract function
$contract->at($contractAddress)->call($functionName, $params, $callback);

// change function state
$contract->at($contractAddress)->send($functionName, $params, $callback);

// estimate deploy contract gas
$contract->bytecode($bytecode)->estimateGas($params, $callback);

// estimate function gas
$contract->at($contractAddress)->estimateGas($functionName, $params, $callback);

// get constructor data
$constructorData = $contract->bytecode($bytecode)->getData($params);

// get function data
$functionData = $contract->at($contractAddress)->getData($functionName, $params);
```

# Assign value to outside scope(from callback scope to outside scope)
Due to callback is not like javascript callback, 
if we need to assign value to outside scope, 
we need to assign reference to callback.
```php
$newAccount = '';

$web3->personal->newAccount('123456', function ($err, $account) use (&$newAccount) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }
    $newAccount = $account;
    echo 'New account: ' . $account . PHP_EOL;
});
```

# Develop

### Local php cli installed

1. Clone the repo and install packages.
```
git clone https://github.com/sc0Vu/web3.php.git && cd web3.php && composer install
```

2. Run test script.
```
vendor/bin/phpunit
```


1. Change testHost in `TestCase.php`
```
/**
 * testHost
 * 
 * @var string
 */
protected $testHost = 'http://ganache:8545';
```

1. Run test script
```
vendor/bin/phpunit
```

###### Remove extension
Move the extension config from `/usr/local/etc/php/conf.d/`
```
mv /usr/local/etc/php/conf.d/extension-config-name to/directory
```

# API

Todo.

# License
MIT
