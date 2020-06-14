<?php

namespace App\Observers;

use App\Order;

/**
 * Class OrderObserver
 * @package App\Observers
 */
class OrderObserver
{

    /**
     * @param Order $order
     */
    public function saving(Order $order)
    {
        $order->order_number = uniqid();
    }
}
