<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {

            return Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
    }
    public function home()
    {
        $itemsincart = $this->include();
        $products = Product::paginate(2);
        $categories = Category::orderBy('priority')->get();
        return view('welcome',compact('products','categories','itemsincart'));
    }

    public function index()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();


        }
        $categories = Category::orderBy('priority')->get();
        $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
        return view('viewcart',compact('carts','categories','itemsincart'));
    }

    public function about()
    {
        return view('about');
    }

    public function viewproduct(Product $product)
    {
        $itemsincart = $this->include();
        // $product = Product::find($id);
        $relatedproducts = Product::where('category_id',$product->category_id)->whereNot('id',$product->id)->get();
        $categories = Category::orderBy('priority')->get();
        return view('viewproduct',compact('product','categories','itemsincart','relatedproducts'));
    }


    public function userlogin()
    {
        $itemsincart = $this->include();
        $categories = Category::orderBy('priority')->get();
        return view('userlogin',compact('categories','itemsincart'));
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
        $orders = Order::where('user_id',auth()->user()->id)->get();
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


    public function store(Request $request)
    {
        /*$data=$request->validate([
           'category_id'=>'required',
            'name'=>'required',
            'price'=>'numeric|required',
            'oldprice'=>'numeric|nullable',
            'stock'=>'numeric|required',
            'description'=>'required',
            'photopath'=>'required'
        ]);
        */

     
            $data = $request->validate([
                'qty' => 'required',
                'product_id' => 'required',
            ]);
    
            $data['user_id'] = auth()->user()->id;
    
            $data['qty']=$request->qty;
            //check if already exist
            $check = Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->where('is_ordered',false)->count();
            if($check > 0)
            {
                return back()->with('success','Item already in Cart');
            }
    
            Cart::create($data);
            return back()->with('success','Item added to Cart');
        }

        public function checkout()
        {

           $totalamount=session()->get('totalamount');
            if(!auth()->user())
            {
                $itemsincarts = 0;
            }
            else
            {
                $itemsincart= Cart::where('user_id',auth()->user()->id)->count();
              
            }
            $categories = Category::orderBy('priority')->get();
            return view('checkout',compact('categories','itemsincart','totalamount'));
        }
        public function destroy($id)
        {
            $cart = Cart::find($id);
        
            if (!$cart) {
                return redirect(route('cart.index'))->with('error', 'Cart item not found');
            }
        
            $cart->delete();
        
            return redirect(route('cart.index'))->with('success', 'Cart item deleted successfully');
        }
        
    }
        
    
