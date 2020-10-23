<?php

namespace App\Http\Controllers;


use App\Category;
use App\Order;
use App\Product;
use App\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(30)->get();
        return view('shops.index', ['products' => $products, 'categories' => $categories]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $categories = Category::all();

        return view('shops.show', ['product' => $product, 'categories' => $categories]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Product $product, Request $request)
    {

        $order = $this->generateOrder();

        $productUser = new ProductOrder();
        $productUser->product_id = $product->id;
        $productUser->order_id = $order->id;
        $productUser->product_pricing = $product->pricing * $request['quantity'];
        $productUser->quantity = $request['quantity'];

        $productUser->save();

        $totalPricing = ProductOrder::sum('product_pricing');
        $this->updateTotalPrice($totalPricing, $order->id);

        return redirect('shops');

    }

    private function generateOrder()
    {

        $user = Auth::user();

        $orderGenerate = Order::where('user_id', $user->id)
            ->where('status', 'cotizacion')
            ->first();

        if(!empty($orderGenerate))
        {
            return $orderGenerate;
        }
        $order = new Order();
        $order->user_id = $user->id;
        $order->status = 'cotizacion';

        $order->save();

        return $order;
    }

    public function showCart()
    {
        $user = Auth::user();

        $orderGenerate = Order::where('user_id', $user->id)
            ->where('status', 'cotizacion')
            ->first();

        $products = ProductOrder::where('order_id', $orderGenerate->id)->get();

        return view('shops.showCart', ['products' => $products, 'totalPricing' => $orderGenerate->total_price]);
    }

    private function updateTotalPrice($totalPricing, $id)
    {
        $order = Order::findOrFail($id);
        $order->total_price  = $totalPricing;

        $order->update();
    }
}
