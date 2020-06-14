<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    /** @test */
    public function orders_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('orders', [
                'id', 'status', 'is_paid', 'payment_method', 'grand_total', 'item_count', 'currency_id', 'email', 'shipping_fullname', 'shipping_address', 'shipping_phone', 'notes'
            ]), 1);
    }

    /** @test */
    public function a_order_belongs_to_many_order_items()
    {
        $order = factory('App\Order')->create();
        $product = factory('App\Product')->create()->first();

        $order->items()->attach($product->id, ['price' => $product->price, 'quantity' => $this->faker->numberBetween(1, 10)]);

        $this->assertEquals($product->id, $order->items[0]->id);
        $this->assertInstanceOf('App\Product', $order->items[0]);
    }
}
