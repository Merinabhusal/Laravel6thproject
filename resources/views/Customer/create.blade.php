@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Add customer</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('customer.store')}}"method="POST" class="m-5 "
enctype="multipart/form-data">
@csrf

  <div>
    <label for="">Name</label>
    <input type="text"placeholder="Customer Name" name="name"class="w-full
    rounded-lg border-gray-300 my-2"value="{{old('name')}}">
    @error('name')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  

  <div>
    <label for="">Email</label>
    <input type="text"placeholder="Email" name="email"class="w-full
    rounded-lg border-gray-300 my-2"value="{{old('email')}}">
    @error('email')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
  </div>

  

  
    <div class="flex">
        <input type="submit"class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg"value="Add customer">
        <a href="{{route ('customer.index')}}"class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
    </div>

</form>

@endsection