<?php

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;
use App\Product;

class CategoryController extends Controller
{
    public function filter(Request $request)
    {
        $category = $request->category;
        $products = Product::where('category_id',$category)->get();
        $categories = Category::all();
        return view('categories.filter', ['products' => $products, 'categories' => $categories]);
    }
}
