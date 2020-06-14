<?php

namespace App\Http\Controllers;

use App\Helpers\CurrencyConverter;
use App\Product;
use Darryldecode\Cart\CartCondition;


/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     *
     */
    private CONST DELIVERY_COST = 2;

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function add(Product $product)
    {
        // add the product to cart
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return response()->json(
            [
                'item_count' => \Cart::getContent()->count(),
                'view' => view('templates.card_items')->render(),
                'subtotal' => \Cart::getSubTotal()
            ], 201
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cartItems = \Cart::getContent();
        return view('cart.index', compact('cartItems'));
    }

    /**
     * @param $itemId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($itemId)
    {

        \Cart::remove($itemId);

        return response()->json(
            [
                'item_count' => \Cart::getContent()->count(),
                'subtotal' => \Cart::getSubTotal(),
                'is_empty' => \Cart::isEmpty()
            ]
        );
    }

    /**
     * @param $rowId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($rowId)
    {
        \Cart::update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);
        return response()->json([
            'item_price_sum' => \Cart::get($rowId)->getPriceSum(),
            'item_quantity' => \Cart::get($rowId)->quantity,
            'subtotal' => \Cart::getSubTotal()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    public function checkout()
    {
        $condition = new CartCondition(array(
            'name' => 'Express Shipping $2',
            'type' => 'shipping',
            'target' => 'total',
            'value' => self::DELIVERY_COST,
            'order' => 1
        ));
        \Cart::condition($condition);

        $converter = new CurrencyConverter();
        $converter->setConvert(\Cart::getTotal(), 'EUR');
        return view('cart.checkout',
            [
                'basket_items' => \Cart::getContent(),
                'delivery_cost' => self::DELIVERY_COST,
                'subtotal_eur' => \Cart::getTotal(),
                'subtotal_usd' => $converter->getConvert('USD')
            ]);
    }
}
