<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

class OrderController extends Controller
{
public function store(Request $request)
{
   $data=$request->validate([

    'payment_method'=>'required',
    'shipping_address'=>'required',
    'phone'=>'required',
    'person_name'=>'required',
   ]) ;
    $data['user_id']=auth()->user()->id;
    $data['order_date']=date('y-m-d');
    $data['status']='pending';
    $cartids=Cart::where('user_id',auth()-> user()->id)->where('is_ordered',false)->get();
    $totalamount=0;
    foreach($cartids as $cartid)
    {
      $total = $cartid->qty * $cartid->product->price;
      $totalamount +=$total;
    }
   $data['amount']=$totalamount;
   $ids = $cartids->pluck('id')->toArray();
   $data['cart_id']=implode(',',$ids);
   order::create($data);
   Cart::whereIn('id',$ids)->update(['is_ordered'=>true]);
   return redirect()->route('home')->with('success','Order placed successfully');
  
   }
}