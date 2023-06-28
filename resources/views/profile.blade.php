@extends('master')
@section('content')
@include('layouts.message')
    <div class="w-1/2 mx-auto p-6 rounded-lg bg-gray-200 shadow-lg my-5">
        <h2 class="font-bold text-4xl text-center my-4">Information</h2>
        <form action="{{route('userprofile.store')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter Name" class="w-full px-2 rounded-lg  my-4">
            <input type="text" name="email" placeholder="Email" class="w-full px-2 rounded-lg  my-4">
            <input type="phone" name="phone" placeholder="Password" class="w-full px-2 rounded-lg  my-4">
            
 
           
        </form>
    </div>

@endsection