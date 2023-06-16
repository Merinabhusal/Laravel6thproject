@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Edit product</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('product.update',$product->id)}}"method="POST" class="m-5 "
enctype="multipart/form-data">
@csrf

  <div>
    <label for="">Name</label>
    <input type="text"placeholder="Product Name" name="name"class="w-full
    rounded-lg border-gray-300 my-2"value="{{$product->name}}">
    @error('name')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  <div>
    <label for="">Old Price</label>
    <input type="number"placeholder="Old Price" name="oldprice"class="w-full
    rounded-lg border-gray-300 my-2"value="{{$product->oldprice}}">
    @error('oldprice')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  

  <div>
    <label for="">Price</label>
    <input type="text"placeholder="Price" name="price"class="w-full
    rounded-lg border-gray-300 my-2"value="{{$product->price}}">
    @error('price')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>


  <div>
    <label for="">Category</label>
    <select name="category_id" id="" class="w-full rounded-lg border-gray-300 my-2" >
      @foreach ($categories as $category )
      <option value="{{$category->id}}" @if ($product->category_id==$category->id)selected @endif>{{$category->name}}</option>
        
   
      @endforeach
 
    </select>
  </div>

  {{-- <div>
    <label for="">Category</label>
    <input type="text"placeholder="Category" name="category"class="w-full
    rounded-lg border-gray-300 my-2"value="{{$product->category}}">
    @error('category')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div> --}}


  <div>
    <label for="">Stock</label>
    <input type="text"placeholder="Stock" name="stock"class="w-full
    rounded-lg border-gray-300 my-1"value="{{$product->stock}}">
    @error('stock')
    <p class="text-red-600 text-xs -mt-1">{{$message}}</p>    
    @enderror
  </div>

  
  <div>
    <label for="">Description</label>
   <textarea placeholder="Product Description" name="description"class="w-full
   rounded-lg border-gray-300 my-2">{{$product->description}}</textarea>
    @error('description')
    <p class="text-red-600 text-xs -mt-1">{{$message}}</p>    
    @enderror
  </div>

  <div>
    <p>Current Picture</p>
    <img class="w-44" src="{{asset('images/products/'.$product->photopath)}}" alt="">
    <input type="file"placeholder="photopath" name="photopath"class="w-full
    rounded-lg border-gray-300 my-1"value="{{$product->photopath}}">

    @error('photopath')
    <p class="text-red-600 text-xs -mt-1">{{$message}}</p>    
    @enderror

  </div>
    <div class="flex">
        <input type="submit"class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg"value="Update product">
        <a href="{{route ('product.index')}}"class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
    </div>

</form>

@endsection