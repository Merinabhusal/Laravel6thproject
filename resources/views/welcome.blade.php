@extends('master')
@section('content')

<div class="bg-gray-100 rounded-lg shadow-lg relative ">
    <section class="slider_container">
        <div class="container">
          <div class="swiper myswiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="image/slide1.jpg" alt=""class="h-[700px]w-full width-100% object-cover rounded-t-lg">
                </div>
             
         
              <div class="swiper-slide">
              
                  <img src="image/slide1.jpg">
                </div>
             
           
              <div class="swiper-slide">
              
                  <img src="image/slide2.jpg">
           
             
              </div>
              <div class="swiper-slide">
              
                <img src="image/slide3.jpg">
         
           
            </div>
          
              
              <div class="flex px-5 justify-between bg-gray-300 text-lg">
      
        </div>
      </section>
</div>


<h2 class="font-bold text-4xl text-center my-5">Our Products</h2>

<div class="grid grid-cols-4 gap-10 px-24 mb-10">

    @foreach($products as $product)
    <a href="{{route('viewproduct',$product->id)}}">
        <div class="bg-gray-100 rounded-lg shadow-lg relative">
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-72 object-cover rounded-t-lg">
            <div class="p-2">
                <p class="font-bold text-2xl">{{$product->name}}</p>
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
