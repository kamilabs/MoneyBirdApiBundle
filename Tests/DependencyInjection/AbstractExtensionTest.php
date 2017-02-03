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
use Picqer\Financials\Moneybird\Connection;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use GuzzleHttp\Middleware;


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

    public function testNormalConfiguration()
    {
        $this->loadConfiguration($this->container, 'normal');
        $this->container->compile();

        $this->assertTrue($this->container->has('kami_moneybird'));

        $moneybird = $this->container->get('kami_moneybird');
        $connection = $moneybird->getConnection();

        $this->assertInstanceOf(Connection::class, $connection);

        $this->assertTrue($this->container->getParameter('kami_moneybird.debug'));
        $this->assertTrue($connection->isTesting());

        $this->assertEquals('localhost', $this->container->getParameter('kami_moneybird.redirect_url'));
        $this->assertEquals('localhost', $this->getPrivatePropertyOfInstance($connection, 'redirectUrl'));

        $this->assertEquals('test_client_id', $this->container->getParameter('kami_moneybird.client_id'));
        $this->assertEquals('test_client_id', $this->getPrivatePropertyOfInstance($connection, 'clientId'));

        $this->assertEquals('test_client_secret', $this->container->getParameter('kami_moneybird.client_secret'));
        $this->assertEquals('test_client_secret', $this->getPrivatePropertyOfInstance($connection, 'clientSecret'));
    }

    /**
     * Return value of a private property using ReflectionClass
     *
     * @param mixed $instance
     * @param string $property
     *
     * @return mixed
     */
    private function getPrivatePropertyOfInstance($instance, $property)
    {
        $reflector = new \ReflectionClass($instance);
        $reflectorProperty = $reflector->getProperty($property);
        $reflectorProperty->setAccessible(true);

        return $reflectorProperty->getValue($instance);
    }
}
