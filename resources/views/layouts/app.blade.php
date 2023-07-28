<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

       <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src={{asset('datatable/datatables.js')}}></script>
    </head>
    <body class="font-sans antialiased">
        @include('layouts.message')

        <div class="flex" >
            <div class="w-56 h-screen bg-red-200 shadow-lg shadow-red-300">
                <div class="px-4 py-4 rounded-lg text-black flex justify-between">
                    <p class="font-bold text-lg">Glamour Cosmetics</p>
                  
                </div>

                <img class="bg-white mx-4 w-36 my-4 rounded-lg py-4"src="https://www.pngkit.com/png/detail/263-2636288_admin-premiumcare-female-administrator-icon.png"alt="">

<h3>Hello,{{auth()->user()->name}}</h3>

                <div>
                    <a href=""class="text-x1 font-bold border-b-2 border-blue-500 block m1-4 px-2 py-1 hover:bg-blue-500 hover:text-white">Dashboard</a>
                   
                <a href="{{ route('category.index') }}" class="text-x1 font-bold border-b-2 border-blue-500 block m1-4 px-2 py-1 hover:bg-blue-500 hover:text-white">Categories</a>
            


                @if (auth()->user()->role=='admin')

                <a href="{{ route('product.index') }}" class="text-x1 font-bold border-b-2 border-blue-500 block m1-4 px-2 py-1 hover:bg-blue-500 hover:text-white">products</a>  
                @endif

                
                
                <a href="{{ route('customer.index') }}" class="text-x1 font-bold border-b-2 border-blue-500 block m1-4 px-2 py-1 hover:bg-blue-500 hover:text-white">Customers</a>
               
                <a href="{{ route('order.index') }}" class="text-x1 font-bold border-b-2 border-blue-500 block m1-4 px-2 py-1 hover:bg-blue-500 hover:text-white">Orders</a>
                <form action="{{route('logout')}}"method="POST">
                    @csrf
                <input type="submit" value="Logout " class="text-x1 font-bold border-b-2 border-blue-500 block m1-4 px-2 py-1 hover:bg-blue-500 hover:text-white">
                </form>
            </div>

        </div>   


        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        <div class="p-4 flex-1">
            @yield('content')
            </div> 
        </div>  
       
   
</body>
</html>
  
   