<?php

/*
 * This file is part of the KamiMoneyBirdApiBundle package.
 *
 * (c) Stepanenko Stanislav <dsazztazz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Kami\MoneyBirdApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;


class KamiMoneyBirdApiExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (isset($config['redirect_url'])) {
            $container->setParameter('kami_moneybird.redirect_url', $config['redirect_url']);
        }
        if (isset($config['client_id'])) {
            $container->setParameter('kami_moneybird.client_id', $config['client_id']);
        }
        if (isset($config['client_secret'])) {
            $container->setParameter('kami_moneybird.client_secret', $config['client_secret']);
        }
        if (isset($config['debug'])) {
            $container->setParameter('kami_moneybird.debug', $config['debug']);
        }
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'kami_moneybird';
    }
}
