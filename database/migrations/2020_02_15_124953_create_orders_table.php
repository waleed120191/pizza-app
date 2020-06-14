<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['cash_on_delivery', 'card'])->default('cash_on_delivery');
            $table->float('grand_total');
            $table->unsignedSmallInteger('item_count');
            $table->unsignedSmallInteger('currency_id')->default(1);
            $table->string('email', 100);
            $table->index('email');
            $table->string('shipping_fullname');
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
