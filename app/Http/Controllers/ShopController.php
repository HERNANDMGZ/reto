<?php

namespace App\Http\Controllers;


use App\Category;
use App\Contracts\WebCheckoutContract;
use App\Http\Requests\ProductOrderFormRequest;
use App\Invoice;
use App\Order;
use App\Product;
use App\ProductOrder;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\New_;


class ShopController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(30)->get();
        return view('shops.index', ['products' => $products, 'categories' => $categories]);


    }

    /**
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
     * @param Product $product
     * @param ProductOrderFormRequest $request
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToCart(ProductOrderFormRequest $request,  Product $product)
    {

        $order = $this->generateOrder();

        $productUser = new ProductOrder();
        $productUser->product_id = $product->id;
        $productUser->order_id = $order->id;
        $productUser->product_pricing = $product->pricing * $request['quantity'];
        $productUser->quantity = $request['quantity'];

        $productUser->save();

        $totalPricing = ProductOrder::where('order_id', $order->id)->sum('product_pricing');
        $this->updateTotalPrice($totalPricing, $order->id);

        return redirect('shops');

    }

    /**
     * @return Order
     */
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCart()
    {
        $user = Auth::user();

        $orderGenerate = Order::where('user_id', $user->id)
            ->where('status', 'cotizacion')
            ->first();

        if($orderGenerate)
        {
            $products = ProductOrder::where('order_id', $orderGenerate->id)->get();

            return view('shops.showCart', ['products' => $products, 'totalPricing' => $orderGenerate->total_price, 'id_order' => $orderGenerate->id]);
        }

        return view('shops.showCart', ['products' => null, 'totalPricing' => null]);
    }

    /**
     * @param $totalPricing
     * @param $id
     */
    private function updateTotalPrice($totalPricing, $id)
    {
        $order = Order::findOrFail($id);
        $order->total_price  = $totalPricing;

        $order->update();
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCheckout(Order $order)
    {

        $productOrder = ProductOrder::where('order_id', $order->id)->get();
        return view('shops.getCheckout',['products' => $productOrder]);
    }

    /**
     * @param WebCheckoutContract $webCheckout
     * @param string $reference
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(WebCheckoutContract $webCheckout, string $reference)
    {
        $invoice = Invoice::where('reference', $reference)
            ->first();

        $response = $webCheckout->query($invoice->request_id);
        $invoice->status = $response['status']['status'];
        $invoice->save();

        $productOrder = ProductOrder::where('order_id', $invoice->order_id)->get();

        //TODO procesar la respuesta

        return view('shops.detail', ['response' => $response, 'invoice' => $invoice, 'products' => $productOrder]);
    }

    /**
     * @param string $reference
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewMock(string $reference)
    {
        $invoice = Invoice::select(['total_price', 'reference'])
            ->where('reference', $reference)
            ->first();

        return view('shops.viewMock', ['invoice' => $invoice]);
    }

    /**
     * @param WebCheckoutContract $webCheckout
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function payment(WebCheckoutContract $webCheckout, Request $request)
    {
        $user = Auth::user();

        $orderGenerate = Order::where('user_id', $user->id)
            ->where('status', 'cotizacion')
            ->first();

        $order = Order::findOrFail($orderGenerate->id);

        $order->name = $request->get('name');
        $order->address_payment = $request->get('address_payment');
        $order->phone = $request->get('phone');
        $order->email = $request->get('email');
        $order->status = 'pendiente';
        $order->save();

        $invoice = $this->redirectionToWebCheckout($orderGenerate->id);

        $payment = [
            'locale' => 'es_CO',
            'payment' => [
                'reference' => $invoice->reference,
                'description' => 'Compra tienda virtual',
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total_price,
                    'allowPartial' => 'false',
                ],
            ],
            'expiration' => $invoice->expiration,
            'returnUrl' => route('shops.paymentDetail', $invoice->reference),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->userAgent(),
        ];

        $response = $webCheckout->request($payment);

        if ($response['status']['status'] === 'OK' && isset($response['processUrl']) && isset($response['requestId'])) {
            $invoice->request_id = $response['requestId'];
            $invoice->process_url = $response['processUrl'];
            $invoice->save();

            return redirect($response['processUrl']);
        }
    }

    /**
     * @param $id
     * @return Invoice
     */
    private function redirectionToWebCheckout($id)
    {
        $order = Order::find($id);

        $invoice = new Invoice();

        $invoice->name  =$order->name;
        $invoice->status  =$order->status;
        $invoice->total_price  =$order->total_price;
        $invoice->address_payment =$order->address_payment;
        $invoice->email =$order->email;
        $invoice->phone =$order->phone;
        $invoice->order_id =$order->id;
        $invoice->reference = uniqid();
        $invoice->expiration = new Carbon('tomorrow');

        $invoice->save();

        return $invoice;
    }
}

