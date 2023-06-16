@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Add product</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('product.store')}}" method="POST" class="m-4 "
enctype="multipart/form-data">
@csrf

  <div>
    <label for="">Name</label>
    <input type="text"placeholder="Product Name" name="name"class="w-full
    rounded-lg border-gray-300 my-1"value="{{old('name')}}">
    @error('name')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  <div>
    <label for="">Old Price</label>
    <input type="number"placeholder="Old Price" name="oldprice"class="w-full
    rounded-lg border-gray-300 my-1"value="{{old('oldprice')}}">
    @error('oldprice')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  

  <div>
    <label for="">Price</label>
    <input type="text"placeholder="Price" name="price"class="w-full
    rounded-lg border-gray-300 my-1"value="{{old('price')}}">
    @error('price')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>


  <div>
    <label for="">Category</label>
    <select name="category_id" id="" class="w-full rounded-lg border-gray-300 my-2" >
      @foreach ($categories as $category )
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
 
    </select>
  </div>

  {{-- <div>
    <label for="">Category</label>
    <input type="text"placeholder="Category" name="category"class="w-full
    rounded-lg border-gray-300 my-2"value="{{old('category')}}">
    @error('category')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div> --}}


  <div>
    <label for="">Stock</label>
    <input type="text"placeholder="Stock" name="stock"class="w-full
    rounded-lg border-gray-300 my-1"value="{{old('stock')}}">
    @error('stock')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  
  <div>
    <label for="">Description</label>
   <textarea placeholder="Product Description" name="description"class="w-full
   rounded-lg border-gray-300 my-1"value="{{old('description')}}"></textarea>
    @error('description')
    <p class="text-red-600 text-xs -mt-1">{{$message}}</p>    
    @enderror
  </div>

  <div>

    <input type="file"placeholder="photopath" name="photopath"class="w-full
    rounded-lg border-gray-300 my-1"value="{{old('photopath')}}">

    @error('photopath')
    <p class="text-red-600 text-xs -mt-1">{{$message}}</p>    
    @enderror

  </div>
    <div class="flex">
        <input type="submit"class="bg-blue-600 text-white px-4 py-2 mx-1 rounded-lg"value="Add product">
        <a href="{{route ('product.index')}}"class="bg-red-600 text-white px-10 py-2 mx-1 rounded-lg">Exit</a>
    </div>

</form>

@endsection