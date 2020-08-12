<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() :Void
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() :Renderable
    {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }
}
