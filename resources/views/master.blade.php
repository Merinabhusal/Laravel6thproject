<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glamour Cosmetics</title>
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex px-24 justify-between bg-gray-300 text-lg">
        <span>Ph: 0564564656</span>
        @if(auth()->user())
            <div>
                <a href="">{{auth()->user()->name}} /</a>
                <form class="inline" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit"> Logout</button>
                </form>
                <a href="{{route('cart.index')}}"> My Cart</a>
            </div>
            @else
        <span><a href="{{route('userlogin')}}">Login/Register</a></span>
        @endif
    </div>
    <nav class="navbar sticky top-0">
        <ul class="menu">
            <li><a href="/">Home</a></li>
            @foreach($categories as $category)
            <li><a href="{{route('showproducts',$category->id)}}"> {{$category->name}} </a></li>

            @endforeach
            
        </ul>
    </nav>

    @yield('content')

     <!-- Footer section -->
     <style>
        .footer {
          background-color: #b06ca8;
          /* Additional styling properties for the footer */
          /* height, width, padding, etc. */
        }
      </style>
      
      <footer class="footer">
        <div class="container">
    
            <footer id="footer">
                <!-- top footer -->
                <div class="section p-1">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="flex justify-around">
                            
                            

                             
                            <footer class="footer">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <h4>Contact Us</h4>
                                      <p>123 Glamour Beauty</p>
                                      <p>Nepal,ktm</p>
                                      <p>Phone: (123) 456-7890</p>
                                      <p>Email: info@example.com</p>
                                    </div>
                                    <div class="col-md-4">
                                      <h4>Follow Us</h4>
                                      <ul class="social-media">
                                        <li><a href=""><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                      </ul>
                                    </div>

                                      
                                  <div class="row">
                                    <div class="col-md-12">
                                      
                                      <p>&copy; 2023 Beauty Co. All rights reserved.</p>
                                    </div>
                                  </div>
                                </div>
                              </footer>
                              


                             
    
                         

                            <div class="row">
                                <div class="col-md-3 col-xs-6 ">
                                    <div class="container">
                                        <p style="text-align:center; color:rgb(15, 14, 14) </p>
                                        <h3 class= "footer-title >Categories</h3>
                                        <ul class="footer-links">
                                            <p style="text-align:center;
                                             <li><a href=">SkinCare</a></li>
                                              <p style="text-align: center;
                                            <li><a href="#> Haircare</a></li>
                                             <p style="text-align: center;
                                            <li><a href="#>Makeup</a></li>
                                             <p style="text-align: center;
                                             <li><a href="#>Nails</a></li>
                                             <p style="text-align: center;
                                            <li><a href="#>Fragrances</a></li>
                                            <p style="text-align: center;
                                            <li><a href="#>Organic and Natural</a></li>
    
                                        </p>
    
                             </div>
                                
                                           
                                        
                                            
                                        </ul>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 ">
                                        <div class="container">
                                            <p style="text-align:center; color:rgb(15, 14, 14) </p>
                                            <h3 class= "footer-title >About Us</h3>
                                            <ul class="footer-links">
                                                <p style="text-align:center;
                                                 <li><a href="img>Products</a></li>
                                                  <p style="text-align: center;
                                                <li><a href="#> Shipping and returns</a></li>
                                                 <p style="text-align: center;
                                                <li><a href="#>Privacy Policy</a></li>
                                                <p style="text-align: center;
                                                <li><a href="#>Terms and condition</a></li>
        
                                            </p>
        
                                 </div>
                                    
                                               
                                            
                                                
                                            </ul>
                                        </div>
                                    </div> 
                            
                            <div class="clearfix visible-xs"></div>
    
                            
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
      
        