<?php

/*
 * This file is part of the KamiMoneyBirdApiBundle package.
 *
 * (c) Stepanenko Stanislav <dsazztazz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Kami\MoneyBirdApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class KamiMoneyBirdApiServiceTest extends KernelTestCase
{
    private $moneybird;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->moneybird = static::$kernel->getContainer()->get('kami.moneybird.api');
   }
}
