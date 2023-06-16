@extends('layouts.app')
@section('content')
@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">Dashboard</h2>
<hr class="h-1 bg-purple-200">

<div class="mt-4 grid grid-cols-3 gap-10">

    <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex justify-between">
        <p class="font-bold text-lg">All products</p>
        <p class="font-bold text-5xl">1000</p>
    </div>

    <div class="px-4 py-8 rounded-lg bg-red-600 text-white flex justify-between">
<p class="font-bold text-lg">Total Categories</p>
<p class="font-bold text-5xl">8</p>


    </div>
    <div class="px-4 py-8 rounded-lg bg-yellow-600 text-white flex justify-between">
        <p class="font-bold text-lg">Orders</p>
        <p class="font-bold text-5xl">19</p>
    </div>

  
</div>
@endsection
