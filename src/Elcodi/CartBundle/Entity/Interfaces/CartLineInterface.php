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

namespace Elcodi\CartBundle\Entity\Interfaces;

use Elcodi\ProductBundle\Entity\Interfaces\ProductInterface;
use Elcodi\ProductBundle\Entity\Interfaces\PurchasableInterface;
use Elcodi\ProductBundle\Entity\Interfaces\VariantInterface;

/**
 * Class CartLineInterface
 */
interface CartLineInterface extends PriceInterface
{
    /**
     * Set Cart
     *
     * @param CartInterface $cart Cart
     *
     * @return CartLineInterface self Object
     */
    public function setCart(CartInterface $cart);

    /**
     * Get cart
     *
     * @return CartInterface
     */
    public function getCart();

    /**
     * Set the product
     *
     * @param ProductInterface $product Product
     *
     * @return CartLineInterface self Object
     */
    public function setProduct(ProductInterface $product);

    /**
     * Returns the product variant
     *
     * @return VariantInterface
     */
    public function getVariant();

    /**
     * Sets the product variant
     *
     * @param VariantInterface $variant
     *
     * @return CartLineInterface self Object
     */
    public function setVariant($variant);

    /**
     * Get the product
     *
     * @return ProductInterface product attached to this cart line
     */
    public function getProduct();

    /**
     * Sets the Purchasable object on this line
     *
     * @param PurchasableInterface $purchasable
     *
     * @return CartLineInterface
     */
    public function setPurchasable(PurchasableInterface $purchasable);

    /**
     * Gets the Purchasable object on this line
     *
     * @return PurchasableInterface
     */
    public function getPurchasable();

    /**
     * Set quantity
     *
     * @param int $quantity Quantity
     *
     * @return CartLineInterface self Object
     */
    public function setQuantity($quantity);

    /**
     * Get quantity
     *
     * @return integer Quantity
     */
    public function getQuantity();

    /**
     * Sets OrderLine
     *
     * @param OrderLineInterface $orderLine OrderLine
     *
     * @return CartLineInterface Self object
     */
    public function setOrderLine($orderLine);

    /**
     * Get OrderLine
     *
     * @return OrderLineInterface OrderLine
     */
    public function getOrderLine();
}
