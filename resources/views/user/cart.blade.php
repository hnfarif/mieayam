@extends('template.master')
@section('content')
    <div class="site-section  pb-0">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-7 section-title text-center mb-5">
                    <h2 class="d-block">Keranjang</h2>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-name">Mie</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-quantity">Jumlah</th>
                                    <th class="product-total">Total Harga</th>
                                    <th class="product-remove">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img width="50" height="50" src="{{ url('/data_images/' . $item['gambar']) }}"
                                                alt="Image" class="img-fluid">
                                            <h2 class="h5 cart-product-title text-black">{{ $item['nama'] }}</h2>
                                        </td>
                                        <td>{{ $item['harga'] }}</td>
                                        <td>{{ $item['jumlah'] }}</td>
                                        <td>{{ $item['harga'] * $item['jumlah'] }}</td>
                                        <td><a href="/cart/update/{{ $item['id'] }}" type="submit"
                                                class="btn btn-primary height-auto btn-sm">X</a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="site-section pt-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">

                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-md btn-block">Lanjutkan Membeli</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Kupon</label>
                            <p>Masukkan Kupon</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Kode Kupon">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-md px-4">Terapkan Kupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Total Keranjang</h3>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black total_semua">{{ $total }}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/cart/store" method="post">
                                        @csrf
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pesan
                                            Sekarang</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
