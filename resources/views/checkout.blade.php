@extends('master')

@include('layouts.message')

@section('title')
Checkout
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center font-bold text-3xl mt-10">Billing Details</h1>
                    
                    <form action="{{route('order.store')}}"method="POST"class="w-1/2 mx-auto my-10">
                        @csrf
                        <input type="text"class="p-4 rounded-lg w-full my-2"name="person_name"placeholder="Full Name"value="{{auth()->user()->name}}">
                        <input type="text"class="p-4 rounded-lg w-full my-2"name="shipping_address"placeholder="Address"value="{{auth()->user()->address}}">
                        <input type="text"class="p-4 rounded-lg w-full my-2"name="phone"placeholder="Phone number"value="{{auth()->user()->phone}}">
                        <input type="text" readonly class="p-4 rounded-lg w-full my-2"name="amount"placeholder="Total amount" value="{{$totalamount}}">
    
                         <select class="p-4 rounded-lg w-full my-2"name="payment_method">
                            <option value="COD">Cash On Delivery</option>
                        </select>
                        <input type="submit" class="bg-green-600 text-white p-5 rounded w-1/3 mx-auto block mt-5 cursor-pointer" value="Place Order">
                    </form>
            </div>
        </div>

    </div>
   
              

   
@endsection