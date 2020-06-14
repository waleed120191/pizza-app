<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;


/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $requestData = $request->validated();
        $requestData['grand_total'] = \Cart::getTotal();
        $requestData['item_count'] = \Cart::getContent()->count();
        $order = $this->orderService->create($requestData);
        //save order items
        $this->orderService->createItems($order, \Cart::getContent());

        $cookie = cookie('email-delivery', $requestData['email'], 2628000);
        return redirect('/')->withMessage('Order has been placed')->withCookie($cookie);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history(Request $request)
    {
        $orders = Order::with('items')->where('email', $request->input('email'))->get();

        if($request->cookie('email-delivery') and !$request->input('email')){
            return redirect(route('order.history', ['email' => $request->cookie('email-delivery')]));
        }

        return view('order.history', compact('orders'));
    }

}
