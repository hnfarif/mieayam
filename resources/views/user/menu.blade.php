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
                <form action="/cart">

                    @foreach ($menu as $item)
                        <div class="wine_v_1 text-center pb-4">
                            <a href="#" class="thumbnail d-block mb-4"><img width="350px"
                                    src="{{ url('/data_images/' . $item->gambar_menu) }}" alt="Image" class="img-fluid"></a>
                            <div>
                                <h3 class="heading mb-1"><a href="#">{{ $item->nama_menu }}</a></h3>
                                <span class="price">Rp{{ $item->harga_menu }}</span>
                            </div>


                            <div class="wine-actions">
                                <h3 class="heading-2"><a href="#">{{ $item->nama_menu }}</a></h3>
                                <span class="price d-block">Rp{{ $item->harga_menu }}</span>
                                <label for="">Jumlah : </label>
                                <input type="number" name="jumlah" id="jumlah" min="0" max="50">
                                {{-- <label for="">Jumlah : </label>
                                <input type="number" name="lvl_1" id="lvl_1" min="0" max="50">
                                --}}
                                <button class="btn add btn_add_1" type="submit"><span class="icon-shopping-bag mr-3"></span>
                                    Beli</button>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>

        </div>
    </div>


@endsection
