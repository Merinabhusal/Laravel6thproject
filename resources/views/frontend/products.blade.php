@extends('master')
@section('content')


<h2 class="font-bold text-4xl text-center my-5">Our Products</h2>

<div class="grid grid-cols-4 gap-10 px-24 mb-10">
 
    @foreach($products as $product)
    <a href="{{route('viewproduct',$product->id)}}">
        <div class="bg-gray-100 rounded-lg shadow-lg relative">
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-72 object-cover rounded-t-lg">
            <div class="p-2">
                <p class="font-bold text-2xl">{{$product->name}}</p>
                <div class="rating-css">
                    <div class="star-icon">
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    </div>
                </div> 
                   

                <p class="font-bold text-2xl">
                    @if ($product->oldprice!='')
                    <span class="line-through text-gray-500 text-xl">{{$product->oldprice}}/-</span>
                        
                    @endif 
                    Rs.{{$product->price}}/-</p>
                    
            </div>
@if($product->oldprice!='')
            @php
                $discount=($product->oldprice-$product->price)/$product->oldprice* 100;
                $discount=round($discount);
            @endphp
                
         <p class="absolute top-1 right-1 bg-blue-600 text-white rounded-lg px-4 py-1">{{$discount}}off</p>
            @endif
        </div>
    </a>
 @endforeach
</div>
<div class="mx-24 my-10">
    {{$products->links()}}

 </div>


    

    
@endsection
