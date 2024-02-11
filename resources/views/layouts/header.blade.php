<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <!-- Uncomment below if you prefer to use an text logo -->
        <!-- <h1><a href="index.html">NewBiz</a></h1> -->
        <a href="{{url('user/home')}}"><img src="{{ asset('front/img/logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @if(auth()->check())
          <li><a class="nav-link scrollto" href="{{route('user.catalogue.deshbored')}}"><i class="fa-solid fa-user"></i></a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- #header -->
