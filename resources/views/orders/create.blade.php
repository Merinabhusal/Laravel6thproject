@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Add customer</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('order.store')}}"method="POST" class="m-5 "
enctype="multipart/form-data">
@csrf

  <div>
    <label for="product_id">Product ID:</label>
    <input type="text"placeholder="product_id" name="name"class="w-full
    rounded-lg border-gray-300 my-2"value="{{old('productID')}}">
    @error('product ID')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  

  <div>
    <label for="quantity">Quantity:</label>
    <input type="number"name="quantity" name="quantity"class="w-full
    rounded-lg border-gray-300 my-2"value="{{old('quantity')}}">
    @error('quantity')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  
<button type="submit">Place Order</button>

</form>

@endsection