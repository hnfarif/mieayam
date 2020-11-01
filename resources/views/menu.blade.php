@extends('template.master')
@section('content')
<div class="site-section mt-5">
<div class="row mb-5">
    <div class="col-12 section-title text-center mb-5">
      <h2 class="d-block">Daftar Menu</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 mb-5 col-md-6">

        <div class="wine_v_1 text-center pb-4">
          <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="images/mieayamjumbo_res.jpg" alt="Image" class="img-fluid"></a>
          <div>
            <h3 class="heading mb-1"><a href="#">Mie ayam Jumbo</a></h3>
            <span class="price">RP25.000</span>
          </div>


          <div class="wine-actions">

            <h3 class="heading-2"><a href="#">Mie ayam Jumbo</a></h3>
            <span class="price d-block">RP25.000</span>

            <button class="btn add btn_add_1" type="submit"><span class="icon-shopping-bag mr-3"></span> Beli</button>
          </div>
        </div>

      </div>

      <div class="col-lg-4 mb-5 col-md-6">
        <div class="wine_v_1 text-center pb-4">
          <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="images/mieayammantap.jpg" alt="Image" class="img-fluid"></a>
          <div>
            <h3 class="heading mb-1"><a href="#">Mie Ayam Bakso</a></h3>
            <span class="price">RP15.000</span>
          </div>

          <div class="wine-actions">
            <h3 class="heading-2"><a href="#">Mie Ayam Bakso</a></h3>
            <span class="price d-block">RP 15.000</span>
            <button class="btn add btn_add_2" type="submit"><span class="icon-shopping-bag mr-3"></span> Beli</button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-5 col-md-6">
        <div class="wine_v_1 text-center pb-4">
          <a href="shop-single.html" class="thumbnail d-block mb-4"><img src="images/mieayamspesial.jpg" alt="Image" class="img-fluid"></a>
          <div>
            <h3 class="heading mb-1"><a href="#">Mie Ayam Special</a></h3>
            <span class="price">RP20.000</span>
          </div>


          <div class="wine-actions">

            <h3 class="heading-2"><a href="#">Mie Ayam Special</a></h3>
            <span class="price d-block">RP20.000</span>

            <button class="btn add btn_add_3" type="submit"><span class="icon-shopping-bag mr-3"></span> Beli</button>
          </div>
        </div>
      </div>

</div>
</div>
  @endsection


