<?php


namespace App\Services;


use App\Order;
use Darryldecode\Cart\CartCollection;

/**
 * Interface OrderService
 * @package App\Services
 */
interface OrderService
{
    /**
     * @param array $data
     * @return Order
     */
    public function create(array $data): Order;

    /**
     * @param Order $order
     * @param CartCollection $data
     */
    public function createItems(Order $order, CartCollection $data): void;
}
