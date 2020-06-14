<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /** @test */
    public function a_user_can_browse_products()
    {
        $post = factory('App\Product')->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($post->name);
    }


    /** @test */
    public function products_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id', 'name', 'description', 'price', 'cover_img'
            ]), 1);
    }

    /** @test */
    public function we_can_create_product_instance()
    {
        $item = factory('App\Product')->create();
        $this->assertInstanceOf('App\Product', $item);
    }

    /** @test */
    public function product_can_be_soft_deleted()
    {
        $item = factory('App\Product')->create();
        $item->delete();
        $this->assertSoftDeleted($item);
    }
}
