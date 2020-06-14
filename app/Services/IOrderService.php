<?php


namespace App\Services;


use App\Order;
use Darryldecode\Cart\CartCollection;

/**
 * Class IOrderService
 * @package App\Services
 */
class IOrderService implements OrderService
{
    /**
     * @param array $requestData
     * @return Order
     */
    public function create(array $requestData): Order
    {
        return Order::create($requestData);
    }

    /**
     * @param Order $order
     * @param CartCollection $data
     */
    public function createItems(Order $order, CartCollection $data): void
    {
        foreach ($data as $item) {
            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
        }
        \Cart::clear();
    }

}
