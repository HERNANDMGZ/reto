<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = trim($request->get('search'));

        if ($request) {
            $products = Product::where('name', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->paginate(5);
            return view('products.index', ['products'=> $products,'search'=>$query]);
        }

        //$products = Product::all();
        //return view("products.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)

    {
        $product = new Product();
        $product->name  =request('name');
        $product->description =request('description');
        $product->pricing =request('pricing');

        if ($request ->hasfile('image')){

            $image = $request->file('image');

            $name_image = $image-> date("Y_m_d_h_i_s").random_int(100, 999).'.'.$image->getClientOriginalExtension();

            \Storage::disk('public')->put($name_image,  \File::get($image));
            $product->image = $name_image;

        }
        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => Product::findOrFail($id)]);
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
        $product = Product::findOrFail($id);
        $product->name  = $request->get('name');
        $product->pricing =$request->get('pricing');
        $product->description =$request->get('description');
        $product->status = $request->get('status');

        $product->update();

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products');
    }
}
