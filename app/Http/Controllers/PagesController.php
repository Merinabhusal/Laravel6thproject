<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $products = Product::paginate(4);
        $categories = Category::orderBy('priority')->get();
        return view('welcome', compact('products', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function viewproduct(Product $product)
    {
        // $product = Product::find($id);
        $categories = Category::orderBy('priority')->get();
        return view('viewproduct', compact('product', 'categories'));
    }
    public function showproducts(string $id)
    {
      
        $categories = Category::all();
        $products = Product::where('category_id', '=', $id)->paginate(10);
        

        return view('frontend.products', compact('categories', 'products'));
    }

    public function userlogin()
    {
        $categories = Category::orderBy('priority')->get();
        return view('userlogin', compact('categories'));
    }
}
