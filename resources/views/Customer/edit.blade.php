@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Edit Customer</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('customer.update',$customer->id)}}"method="POST" class="mt-5">
@csrf
    <input type="text"placeholder="customer Name" name="name"class="w-full
    rounded-lg border-gray-300 my-2"value="{{$customer->name}}">
    @error('name')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror
    <input type="text"placeholder="email" name="email"class="w-full
    rounded-lg border-gray-300 my-2"value="{{($customer->email)}}">

    @error('email')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>    
    @enderror




    <div class="flex">
        <input type="submit"class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg"value="Update Customer">
        <a href="{{route ('customer.index')}}"class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
    </div>

</form>

@endsection