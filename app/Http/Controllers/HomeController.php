<?php

namespace App\Http\Controllers;


use App\Product;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show product list at home page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $products = Product::take(8)->get();

        return view('home', ['allProducts' => $products]);
    }
}
