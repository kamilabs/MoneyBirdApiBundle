MoneyBirdApiBundle
==================

MoneyBird Bundle for Symfony 2 Applications. Bundle provides wrapper for [moneybird-php-client](https://github.com/picqer/moneybird-php-client)


Installation
-------------

### 1. Download:
Prefered way to install this bundle is using [composer](http://getcomposer.org)

Download the bundle with composer:
```bash
$ php composer.phar require "kami/moneybird-api-bundle"
```
### 2. Enable the bundle in the kernel:

```php
<?php

// app/AppKernel.php


public function registerBundles()
{
    $bundles = array(
        // ...

        new Kami\MoneyBirdApiBundle\KamiMoneyBirdApiBundle(),
    );
}
```
### 3. Configure the bundle:

Add the following configuration to your config.yml.
```yml
# app/config/config.yml
kami_moneybird:
    redirect_url: localhost
    client_id: test_client_id
    client_secret: test_client_secret
    debug: false # optional value for activation test mode
```

Only first three configuration values are required to use the bundle.


MoneyBird Service
--------------

Core component of this bundle is MoneyBird service.
```php
<?php
    $this->get('kami_moneybird'); /** @var \Picqer\Financials\Moneybird\Moneybird */
```

