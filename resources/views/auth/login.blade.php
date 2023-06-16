<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="grid grid-cols-2 justify-items-center content-center bg-red-200 h-screen ">
      <div>
        <img src="https://thumbs.dreamstime.com/b/login-button-18138482.jpg" alt=""class="p-12">
      </div>
      @if($errors->any())
        @foreach($errors->all() as $error)
        {{$error}}
        @endforeach
      @endif
        <div class="flex justify center items-center">
            <div class="w-full text-center">
                <h2 class="font-bold text-4xl">Welcome to Glamour Cosmetics</h2>
                <img src="https://www.guide2free.com/wp-content/uploads/2019/05/FREE-Beauty-Products-from-Glamour-Magazine.jpg"alt=""class="mx-auto my-6 h-32">
                <form action="{{route('login')}}"method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter Email"class="p-4 rounded-lg w-8/12 my-4">

                <input type="password" name="password" placeholder="password"class="p-4 rounded-lg w-8/12 my-4">

                <input type="submit" value="Login" class=" bg-blue-500 text-center text-white font-bold  font-2xl p-4 rounded-lg w-8/12 my-4">
                   
                <a href="/register">
                    <input type="button" value="Register" class="cursor-pointer bg-blue-500 text-center text-white font-bold  font-2xl p-4 rounded-lg w-8/12 my-4">
                </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>