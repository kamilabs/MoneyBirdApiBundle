<?php

/*
 * This file is part of the KamiMoneyBirdApiBundle package.
 *
 * (c) Stepanenko Stanislav <dsazztazz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Kami\MoneyBirdApiBundle\Tests\DependencyInjection;

use Kami\MoneyBirdApiBundle\DependencyInjection\KamiMoneyBirdApiExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;


abstract class AbstractExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    protected function setUp()
    {
        $this->extension = new KamiMoneyBirdApiExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    abstract protected function loadConfiguration(ContainerBuilder $container, $resource);

    public function testWithoutConfiguration()
    {
        // An extension is only loaded in the container if a configuration is provided for it.
        // Then, we need to explicitely load it.
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        $this->assertFalse($this->container->has('moneybird.api'));
    }

    public function testEnabledConfiguration()
    {
        $this->loadConfiguration($this->container, 'enabled');
        $this->container->compile();

        $this->assertTrue($this->container->has('moneybird.api'));
    }
}
