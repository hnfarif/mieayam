@extends('template.master')
@section('content')
<div class="owl-carousel hero-slide owl-style">
    <div class="intro-section container" style="background-image: url({{asset('images/mieayam1_res.jpg')}})">
      <div class="row justify-content-center text-center align-items-center">
        <div class="col-md-8">
          <span class="sub-title">Mie Mami</span>
          <h1>Mie Ayam</h1>
        </div>
      </div>
    </div>

    <div class="intro-section container" style="background-image: url({{asset('images/mieayam2_res.jpg')}})">
      <div class="row justify-content-center text-center align-items-center">
        <div class="col-md-8">
          <span class="sub-title">Welcome</span>
          <h1>Mie Ayam untuk semuanya</h1>
        </div>
      </div>
    </div>

  </div>

  <div class="site-section mt-5">
    <div class="container">

      <div class="row mb-5">
        <div class="col-12 section-title text-center mb-5">
          <h2 class="d-block">Produk Kami </h2>
          <p>Mie berkualitas yang disajikan dengan bahan dan cara pembuatan yang baik</p>
          <p><a href="#">Lihat semua produk <span class="icon-long-arrow-right"></span></a></p>
        </div>
      </div>
      <div class="row">

        <div class="col-lg-4 mb-5 col-md-6">
          <div class="wine_v_1 text-center pb-4">
            <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="{{asset('images/mieayamjumbo_res.jpg')}}" alt="Image" class="img-fluid"></a>
            <div>
              <h3 class="heading mb-1"><a href="#">Mie ayam Jumbo</a></h3>
              <span class="price">Rp. 25.000</span>
            </div>


            <div class="wine-actions">

              <h3 class="heading-2"><a href="#">Mie ayam Jumbo</a></h3>
              <span class="price d-block">Rp. 25.000</span>

              <a href="#" class="btn add"><span class="icon-shopping-bag mr-3"></span> Tambah ke Keranjang</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-5 col-md-6">
          <div class="wine_v_1 text-center pb-4">
            <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="{{asset('images/mieayammantap.jpg')}}" alt="Image" class="img-fluid" ></a>
            <div>
              <h3 class="heading mb-1"><a href="#">Mie ayam Bakso</a></h3>
              <span class="price">Rp. 15.000</span>
            </div>


            <div class="wine-actions">

              <h3 class="heading-2"><a href="#">Mie Ayam Bakso</a></h3>
              <span class="price d-block"> Rp. 15.000</span>

              <a href="#" class="btn add"><span class="icon-shopping-bag mr-3"></span> Tambah Ke Keranjang</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-5 col-md-6">
          <div class="wine_v_1 text-center pb-4">
            <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="{{asset('images/mieayamspesial.jpg')}}" alt="Image" class="img-fluid"></a>
            <div>
              <h3 class="heading mb-1"><a href="#">Mie ayam Spesial</a></h3>
              <span class="price">Rp 20.000</span>
            </div>


            <div class="wine-actions">

              <h3 class="heading-2"><a href="#">Mie Ayam spesial</a></h3>
              <span class="price d-block"> Rp. 20.000</span>

              <div class="rating">
                <span class="icon-star"></span>
                <span class="icon-star"></span>
                <span class="icon-star"></span>
                <span class="icon-star"></span>
                <span class="icon-star-o"></span>
              </div>

              <a href="#" class="btn add"><span class="icon-shopping-bag mr-3"></span> Tambah Ke Keranjang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-2" style="background-image: url('images/mieayam2_res.jpg');">
    <div class="container">
       <div class="row justify-content-center text-center align-items-center">
         <div class="col-md-8">
           <span class="sub-title">Selamat Datang</span>
           <h2>Mie mami</h2>
         </div>
       </div>
     </div>
   </div>

   <div class="site-section bg-light">
     <div class="container">
       <div class="owl-carousel owl-slide-3 owl-slide">

         <blockquote class="testimony">
           <img src="images/person_cowo.png" alt="Image">
           <p>&ldquo;Baru pertama nyobain langsung ketagihan pingin beli lagi :D&rdquo;</p>
           <p class="small text-primary">&mdash; Paklek Tedjo</p>
         </blockquote>
         <blockquote class="testimony">
           <img src="images/person_cowo.png" alt="Image">
           <p>&ldquo;Wenak pol wes, pokoknya harus cobain makan Mie Mami&rdquo;</p>
           <p class="small text-primary">&mdash; Paklek Suparno</p>
         </blockquote>
         <blockquote class="testimony">
           <img src="images/person_cewe.png" alt="Image">
           <p>&ldquo;Rasa mienya sangat pas dilidah saya, yummy&rdquo;</p>
           <p class="small text-primary">&mdash; Mbak Nisa</p>
         </blockquote>
         <blockquote class="testimony">
           <img src="images/person_cewe.png" alt="Image">
           <p>&ldquo;Sumpah baru pertama kali nyobain mie seenak ini, rasanya kayak mo meninggal:((&rdquo;</p>
           <p class="small text-primary">&mdash; Nanda</p>
         </blockquote>

       </div>
     </div>
   </div>


@endsection
