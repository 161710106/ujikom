<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sonar - Photography Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('assets/frontend/img/core-img/favicon.ico')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/style.css')}}">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="sonar-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Grids -->
    <div class="grids d-flex justify-content-between">
        <div class="grid1"></div>
        <div class="grid2"></div>
        <div class="grid3"></div>
        <div class="grid4"></div>
        <div class="grid5"></div>
        <div class="grid6"></div>
        <div class="grid7"></div>
        <div class="grid8"></div>
        <div class="grid9"></div>
    </div>

    <!-- ***** Main Menu Area Start ***** -->
    <div class="mainMenu d-flex align-items-center justify-content-between">
        <!-- Close Icon -->
        <div class="closeIcon">
            <i class="ti-close" aria-hidden="true"></i>
        </div>
        <!-- Logo Area -->
        <div class="logo-area">
            <a href="index.html">Sonar</a>
        </div>
        <!-- Nav -->
        <div class="sonarNav">
            <nav>
                <ul>
                <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/fortopolio">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/galleri">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kontak">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Copwrite Text -->
        <div class="copywrite-text">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
        </div>
    </div>
    <!-- ***** Main Menu Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area d-flex justify-content-between">
                        <!-- Logo Area  -->
                        <div class="logo-area">
                            <h1><font color="white">HwrPhotography</font></h1>
                        </div>

                        <div class="menu-content-area d-flex align-items-center">
                            <!-- Header Social Area -->
                            <div class="header-social-area d-flex align-items-center">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Icon -->
                            <span class="navbar-toggler-icon" id="menuIcon"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Hero Area Start ***** -->
    <div class="hero-area d-flex align-items-center">
        <!-- Hero Thumbnail -->
        <div class="hero-thumbnail equalize bg-img" style="background-image: url('assets/frontend/img/bg.jpg');"></div>
        
        <!-- Hero Content -->
        <div class="hero-content equalize">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="line"></div>
                        <h2>Take a look at my Gallery</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui.</p>
                        <a href="#" class="btn sonar-btn white-btn">contact me</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Menu -->
        <div class="sonar-portfolio-menu">
            <div class="text-center portfolio-menu">
               
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <!-- ****** Gallery Area Start ****** -->
    <section class="sonar-projects-area" id="projects">
        <div class="container-fluid">
        @php
                $galeris = App\Galerry::all();
                
                @endphp
            <div class="row sonar-portfolio">

                <!-- Single gallery Item -->
                @foreach($galeris as $data)
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes studio wow fadeInUpBig" data-wow-delay="300ms">
                <button class="btn">{{ $data->created_at->diffForHumans() }}</button>
                    
                <a class="gallery-img" href="{{ asset ('assets/img/fotogaleri/'.$data->foto.'')}}"><img src="{{ asset ('assets/img/fotogaleri/'.$data->foto.'')}}" alt="" ></a>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                    
                    </div>
                </div>
                @endforeach
                
            </div>
<br><br>
<section class="white-bg">
      <div class="container">

        <div class="title center">
          <h2>Galeri Video</h2>
          <br>
        </div>

         @foreach($youtube as $data)
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item landscapes studio wow fadeInUpBig" data-wow-delay="300ms">
                <button class="btn">{{ $data->created_at->diffForHumans() }}</button>
                <a class="magpopif" href="https://www.youtube.com/watch?v={{$data->url}}">
                          <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$data->url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </a>                <!-- Gallery Content -->
                    <div class="gallery-content">
                    
                    </div>
                </div>
                @endforeach

           
                      
                </div>
              </div>
            </section>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn sonar-btn">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Gallery Area End ****** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <!-- back end content -->
        <div class="backEnd-content">
            <img class="dots" src="{{asset('assets/frontend/img/core-img/dots.png')}}" alt="">
            <h2>Dream</h2>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('assets/frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('assets/frontend/js/active.js')}}"></script>

</body>

</html>