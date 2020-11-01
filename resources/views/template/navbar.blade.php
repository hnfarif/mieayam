<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-center">
            <a href="/home" class="site-logo">
              <img src="{{asset('images/logo3.png')}}" alt="Image" class="img-fluid" height="20" width="300">
            </a>
          </div>
          <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
        </div>
      </div>


        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

            <div class="container">
                <div class="d-flex align-items-center">

                <div class="mx-auto">
                    <nav class="site-navigation position-relative text-left" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">

                        <li ><a href="{{ url('/') }}" class="nav-link text-left ml-5">Beranda</a>
                        </li>

                        <li ><a href="{{ url('/menu') }}" class="nav-link text-left">Menu</a>
                        </li>

                        <li ><a href="{{ url('/testimonial') }}" class="nav-link text-left">Testimoni</a>
                        </li>

                        <li ><a href="{{ url('/about') }}" class="nav-link text-left">Tentang</a>
                        </li>

                        <li id="idttl"><a href="{{ url('/cart') }}" type="button" class="nav-link text-left" id="ttlCart"><i class="icon-shopping-bag ml-2"></i></a>
                        </li>


                    <ul>
                    </nav>

                </div>

                </div>
            </div>

        </div>

    </div>


    </div>
