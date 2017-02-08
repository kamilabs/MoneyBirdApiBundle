<?php

/*
 * This file is part of the KamiMoneyBirdApiBundle package.
 *
 * (c) Stepanenko Stanislav <dsazztazz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Kami\MoneyBirdApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Kami\MoneyBirdApiBundle\DependencyInjection\KamiMoneyBirdApiExtension;


class KamiMoneyBirdApiBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new KamiMoneyBirdApiExtension();
        }
        return $this->extension;
    }
}
