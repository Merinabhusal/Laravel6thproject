@extends('master')
@section('content')
@include('layouts.message')

<h1 class="text-center font-bold text-3xl">Items in Cart</h1>

<div class="grid grid-cols-2 gap-5 px-24">
@foreach ($carts as $cart)
    <div class="flex bg-gray-100 my-5 rounded shadow">
        <img src="{{asset('images/products/'.$cart->product->photopath)}}" class="h-32 w-44 object-cover shadow-lg my-2">
        <div class="px-4 py-1">
            <h2 class="text-2xl font-bold">{{$cart->product->name}}</h2>
            <h2 class="text-2xl font-bold ">{{$cart->product->price}}</h2>
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