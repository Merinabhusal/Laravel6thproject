<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
    }
    public function home()
    {
        $itemsincart = $this->include();
        $products = Product::paginate(4);
        $categories = Category::orderBy('priority')->get();
        return view('welcome', compact('products', 'categories','itemsincart'));
    }

    public function about()
    {
        $itemsincart = $this->include();
         $categories = Category::orderBy('priority')->get();
        return view('welcome', compact('products', 'categories','itemsincart'));
       
    }

    public function viewproduct(Product $product)
    {
        // $product = Product::find($id);
        $itemsincart = $this->include();
        $categories = Category::orderBy('priority')->get();
        return view('viewproduct', compact('product', 'categories','itemsincart'));
    }
    public function showproducts(string $id)
    {
        $itemsincart = $this->include();
        $categories = Category::all();
        $products = Product::where('category_id', '=', $id)->paginate(10);
        

        return view('frontend.products', compact('categories', 'products','itemsincart'));
    }

    public function userlogin()
    {
        $itemsincart = $this->include();
        $categories = Category::orderBy('priority')->get();
        return view('userlogin', compact('categories','itemsincart'));
    }
    public function categoryproduct($id)
    {
        $category = Category::find($id);
        $itemsincart = $this->include();
        $products = Product::where('category_id',$id)->paginate(2);
        $categories = Category::orderBy('priority')->get();
        return view('categoryproduct',compact('products','categories','itemsincart','category'));
    }

    public function orders()
    {
        $categories = Category::orderBy('priority')->get();
        $itemsincart = $this->include();
        $orders = order::where('user_id',auth()->user()->id)->get();
        foreach($orders as $order)
        {
            $cartids = explode(',',$order->cart_id);
            $carts = [];
            foreach($cartids as $cartid)
            {
                $cart = Cart::find($cartid);
                array_push($carts,$cart);
            }
            $order->carts = $carts;
        }

        return view('userorder',compact('orders','categories','itemsincart'));
    }


}

