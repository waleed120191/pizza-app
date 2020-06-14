<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['shipping_fullname','order_number', 'shipping_address', 'shipping_phone', 'payment_method', 'email','grand_total','item_count'];

    /**
     * @var array
     */
    protected $casts = [
        'grand_total' => 'float',
        'quantity' => 'integer',
        'items' => 'object'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id')->withPivot('quantity','price')->withTimestamps();
    }


}
