<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glamour Cosmetics</title>
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
 

  

  <style>
    h2 {
      color: #f543ae;
      font-family: Georgia, serif;
      font-size: 25px;
      font-weight: bold;
      text-transform:uppercase;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="flex px-24 justify-between bg-gray-300 p-2 text-lg">
    <h2>Glamour cosmetics</h2>
    @if(auth()->user())
    <div>
        <a href="">
          <i class='bx bx-user' ></i>
          {{auth()->user()->name}} 
        </a>
        <form class="inline" action="{{route('logout')}}" method="POST">
            @csrf
            <input type="submit" class="bg-blue-600 text-white cursor-pointer" value="Logout">
        </form>
        <div>

          <a href="{{route('cart.index')}}"> <i class='bx bxs-cart'></i>

            Cart
            <span class="badge badge-light">{{$itemsincart}}</span>
           
          </a>
         </div>
  
          
     
</span>

    </div>
    @else
<span><a href="{{route('userlogin')}}">Login/Register</a></span>
@endif
</div>
<nav class="navbar sticky top-0 ">

  <ul class="menu">
    @foreach($categories as $category)
    <li><a href="{{route('showproducts',$category->id)}}"> {{$category->name}} </a></li>
   
    
    @endforeach
  </ul>
</nav>


    
    
    
  </div>
</div>
















   

  
  @yield('content')





</body>
</a>
       
     <!-- Footer section -->
     <style>
        .footer {
          background-color:gray;
          /* Additional styling properties for the footer */
          /* height, width, padding, etc. */
        }
      </style>
      
      <footer class="footer">
        <div class="container">
    
            <footer id="footer">
                <!-- top footer -->
                <div class="section p-20">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="flex justify-around">
                            
                             
                            <footer class="footer">
                                <div class="container">
                                  <div class="row">
                                  <div>
                                    <h3 class="text-black-600 hover:text-yellow-400 cursor-pointer text-x1 font-bold mt-5">Links
                                   </h3>
                                   <ul class="mt-2">
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">About Us</a>
                                      
                                    </li>
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Contact Us</a>
                                    </li>
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Blog</a>
                                    </li>
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Our beauty services</a>
                                    </li>
                                   
                                   </ul>
                                  </div>

                                  




                                    <div class="w-full">
                                      <div class="md:mx-24 mx-5 pt-4 pb-4">
                                        <div class="grid grid-cols-2">
                                          <div class="text-black font-bold hover:text-yellow-200 font-serif text-lg">
                                            <p>&copy; 2023 Beauty Co. All rights reserved.</p>
                                          </div>
                                          <div class="flex justify-end items-end">
                                        <span>
                   <img src="https://th.bing.com/th/id/R.27fd96811fb22e994704e1811f672339?rik=a11ODhfsbBgpwQ&pid=ImgRaw&r=0" alt class="w-16 h-5 inline-block  hover:text-yellow-200 font-serif text-lg">
                  <img src="https://th.bing.com/th/id/R.0ced1ba874eec24ce45a575619222e6f?rik=EeXsrIQ3vcHdwQ&pid=ImgRaw&r=0" alt class="w-16 h-5 inline-block  hover:text-yellow-200 font-serif text-lg">
                  <img src="https://th.bing.com/th/id/OIP.eyPnfaNq1o1TX7spcuKKxAHaCf?pid=ImgDet&rs=1" alt class="w-16 h-5 inline-block  hover:text-yellow-200 font-serif text-lg">
                  
                           </span>

                                        
                                          </div>


                                        </div>
                                       
                                      </div> 
                                 
                                    </div>
                                 
                              </footer>
                              

                              <footer class="footer">
                                <div class="container">
                                  <div class="row">
                                  <div>
                                    <h3 class="text-black-600 hover:text-yellow-400 cursor-pointer text-x1 font-bold mt-5">About Us
                                   </h3>
                                   <ul class="mt-2">
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Products</a>
                                    </li>
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Shipping and Returns</a>
                                    </li>
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Privacy Policy</a>
                                    </li>
                                    <li> 
                                      <a href class="text-black-500 hover:text-yellow-200 font-serif text-lg">Terms and Condition</a>
                                    </li>
                                   
                                   </ul>
                                  </div>

                                  


                           
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                    
                                
                </div>
                <!-- /top footer -->
                    
    
                <!-- bottom footer -->
                
                <!-- /bottom footer -->
            </footer>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/style.css"></script>
            <script src="js/slick.min.js"></script>
            <script src="js/nouislider.min.js"></script>
            <script src="js/jquery.zoom.min.js"></script>
            <script src="js/main.js"></script>
            <script src="js/actions.js"></script>
            <script src="js/sweetalert.min"></script>
    
        <script src="js/script.js"></script>
            <script>var c = 0;
            function menu(){
              if(c % 2 == 0) {
                document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";    
                document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";    
                c++; 
                  }else{
                document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";        
                document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";        
                c++;
                  }
            }
               
            
    </script>
        <script type="text/javascript">
            $('.block2-btn-addcart').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
    
            
            
        </script>
        
    
    
        </div>
    </footer>
    
    
</body>
</html>
     
      </footer>
      
        