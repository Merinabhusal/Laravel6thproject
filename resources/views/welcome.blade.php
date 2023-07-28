@extends('master')
@section('content')


@php
  $image='https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGNvc21ldGljfGVufDB8fDB8fHww&w=1000&q=80'

@endphp

<div class="bg-gray-100 rounded-lg shadow-lg relative ">
   
        

    <div class="md:mx-24 mx-10 mt-10">
        <div class="grid md: grid-cols-3 gap-4">
          <div class="md:row-span-2">
            <img src="https://th.bing.com/th/id/R.6a1d0fcb2d975b7e1d491728853a9852?rik=yVoEd7sjM2JMjg&pid=ImgRaw&r=0" alt class="w-full hover:text-green-200">
          </div>
      
      
          <div class="md:col-start-2">
            <img src="https://i.pinimg.com/originals/58/45/68/5845687bc2b38d76da109ad220d907bd.png" alt class="w-full  hover:text-green-200">
          </div>
          
          <div class="md:col-start-3">
            <img src="https://th.bing.com/th/id/R.5c188ae2a3658b030f50256a776b73e4?rik=lTB6%2b2Ej%2fKWgZQ&pid=ImgRaw&r=0" alt class="w-full  hover:text-green-200">
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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Rate this product
                </button>
                <div class="rating-css">
                    <div class="star-icon">
                        <label for="rating1" class="fa fa-star"></label>
                        <label for="rating2" class="fa fa-star"></label>
                        <label for="rating3" class="fa fa-star"></label>
                        <label for="rating4" class="fa fa-star"></label>
                        <label for="rating5" class="fa fa-star"></label>
                    </div>
                </div> 
              

                <p class="font-bold text-2xl">
                    @if ($product->oldprice!='')
                    <span class="line-through text-gray-500 text-xl">{{$product->oldprice}}/-</span>
             
                        
                    @endif 
                    Rs.{{$product->price}}/-</p>

                    <input type="submit" class="bg-pink-600 text-white cursor-pointer text-align:center;" value="Add to Cart">
                   
                    
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


 

     
