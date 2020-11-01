@extends('template.master')
@section('content')

<div class="hero-2" style="background-image: url('images/mieayam2_res.jpg');">
    <div class="container">
       <div class="row justify-content-center text-center align-items-center">
         <div class="col-md-8">
           <span class="sub-title">Isi pengalaman pertamamu makan Mie Mami</span>
           <h2>Testimoni</h2>
         </div>
       </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
      <div class="row">

        <div class="col-lg-12">
          <div class="section-title mb-5">
            <h2>Isi Testimoni</h2>
          </div>
          <form method="post">

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="fname"> Nama</label>
                        <input type="text" id="fname" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="message">Isi testimoni</label>
                        <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Kirim" class="btn btn-primary py-3 px-5">
                    </div>
                </div>

          </form>
        </div>

      </div>


    </div>
  </div>



@endsection
