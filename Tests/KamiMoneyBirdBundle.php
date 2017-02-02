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

use Kami\MoneyBirdApiBundle\KamiMoneyBirdBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;


class PayumBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeSubClassOfBundle()
    {
        $rc = new \ReflectionClass(KamiMoneyBirdApiBundle::class);
        $this->assertTrue($rc->isSubclassOf(Bundle::class));
    }

    /**
     * @test
     */
    public function couldBeConstructedWithoutAnyArguments()
    {
        new KamiMoneyBirdApiBundle;
    }
} 
