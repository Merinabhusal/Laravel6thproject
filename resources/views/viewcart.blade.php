@extends('master')
@section('content')
@include('layouts.message')


<h1 class="text-center font-bold text-3xl">Items in Cart</h1>
@php
    

    $totalamount=0;
@endphp

<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="grid grid-cols-2 gap-5 px-24">
                @foreach ($carts as $cart)
                <div class="flex bg-gray-100 my-5 rounded shadow">
                    <img src="{{asset('images/products/'.$cart->product->photopath)}}" class="h-32 w-44 object-cover shadow-lg my-2">
                    <div class="px-4 py-1">
                        <h2 class="text-2xl font-bold">{{$cart->product->name}}</h2>
                        <h2 class="text-2xl font-bold ">{{$cart->product->price}}</h2>
                        <h2 class="text-2xl font-bold ">{{$cart->product->stock}}</h2>

                        <h2 class="text-2xl font-bold ">{{$cart->qty * $cart->product->price}}</h2>
                        @php
                       $totalamount= $cart->qty * $cart->product->price+$totalamount;
                           // $totalamount=$cart->product->price+$totalamount;
                        @endphp
                        <button onclick="add()">
                            <span class="bg-gray-200 px-4 py-2 font-bold text-xl">+</span>
                           </button>
                           <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" type="number" name="qty" value="1" id="qty"max="{{$cart->stock}}" min="1" >
                           <button onclick="sub()">
                            <span class="bg-gray-200 px-4 py-2 font-bold text-xl">-</span>
                          </button>
               <a href ="{{route ('cart.destroy',$cart->id)}}">Delete</a>
            
                    </div>
                </div>
                @endforeach
</div>



<div class="mx-24 my-20">
    <a href="{{route('cart.checkout')}}"class="bg-green-600 text-white px-10 py-5 rounded text-lg">Proceed to CheckOut</a>
</div>

<script>
    var qty=document.getElementById('qty');

    function add(){
        qty.value++;
    }

    </script>

<script>
    var qty=document.getElementById('qty');

    function sub(){
        qty.value--;
    }

    </script>

@endsection