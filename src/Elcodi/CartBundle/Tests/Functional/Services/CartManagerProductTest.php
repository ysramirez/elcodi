<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\CartBundle\Tests\Functional\Services;

use Elcodi\CartBundle\Tests\Functional\Services\Abstracts\AbstractCartManagerTest;
use Elcodi\CurrencyBundle\Entity\Interfaces\CurrencyInterface;
use Elcodi\CurrencyBundle\Entity\Money;

/**
 * Tests CartManager class
 *
 * This will test CartManager common methods using a Product with no variants
 */
class CartManagerProductTest extends AbstractCartManagerTest
{

    /**
     * Creates, flushes and returns a Purchasable
     *
     * @return mixed
     */
    protected function createPurchasable()
    {
        /**
         * @var CurrencyInterface $currency
         */
        $currency = $this
            ->getRepository('elcodi.core.currency.entity.currency.class')
            ->findOneBy([
                'iso' => 'USD',
            ]);

        $product = $this
            ->container
            ->get('elcodi.factory.product')
            ->create()
            ->setPrice(Money::create(1000, $currency))
            ->setName('abc')
            ->setSlug('abc')
            ->setEnabled(true)
            ->setStock(10);

        $this
            ->getManager('elcodi.core.product.entity.product.class')
            ->persist($product);

        $this
            ->getManager('elcodi.core.product.entity.product.class')
            ->flush();

        return $product;
    }

    /**
     * Data for testIncreaseCartLineQuantity
     */
    public function dataIncreaseCartLineQuantity()
    {
        return [
            [0, 1, 0],
            [1, 1, 2],
            [0, 0, 0],
            [1, -1, 0],
            [1, -2, 0],
            [1, 10, 10],
            [1, false, 1],
            [1, null, 1],
            [1, true, 1],
            [1, 'true', 1],
            [1, '', 1],
            [1, [], 1],
        ];
    }

    /**
     * Data for testDecreaseCartLineQuantity
     */
    public function dataDecreaseCartLineQuantity()
    {
        return [
            [1, 1, 0],
            [1, 0, 1],
            [1, 2, 0],
            [1, -1, 2],
            [1, -10, 10],
            [1, false, 1],
            [1, null, 1],
            [1, true, 1],
            [1, 'true', 1],
            [1, '', 1],
            [1, [], 1],
        ];
    }

    /**
     * Data for testSetCartLineQuantity
     */
    public function dataSetCartLineQuantity()
    {
        return [
            [1, 1, 1],
            [1, 0, 0],
            [1, 2, 2],
            [1, -1, 0],
            [1, 10, 10],
            [1, 11, 10],
            [1, false, 1],
            [1, null, 1],
            [1, true, 1],
            [1, 'true', 1],
            [1, '', 1],
            [1, [], 1],
        ];
    }

    /**
     * Data for testAddProduct
     */
    public function dataAddProduct()
    {
        return [
            [1, 1],
            [0, 0],
            [11, 10],
            [false, 0],
            [null, 0],
            [true, 0],
            ['true', 0],
            ['', 0],
            [[], 0],
        ];
    }
}
