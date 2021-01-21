@extends('template_admin.layout')


@section('tabel', 'active show')
@section('transaksi', 'active show')
@section('pembelian', 'active show')
@section('content')

    <div class="content">

        <h1>Tabel Pembelian Bahan Baku</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item">
                    <a href="/admin/dashboard">
                        <span class="mdi mdi-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    tabel
                </li>
                <li class="breadcrumb-item">
                    tabel Transaksi
                </li>
                <li class="breadcrumb-item" aria-current="page">Tabel Pembelian Bahan Baku</li>
            </ol>
        </nav>

        <div class="row mt-5">
            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Data Pembelian Bahan Baku</h2>
                        <div class="date-range-report ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-dark font-weight-bold">ID Pembelian</th>
                                    <th class="text-dark font-weight-bold">ID User</th>
                                    <th class="text-dark font-weight-bold">Isi Pembelian</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>24541</td>
                                    <td>
                                        <a class="text-dark" href=""> Coach Swagger</a>
                                    </td>
                                    <td class="d-none d-lg-table-cell">1 Unit</td>
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdown-recent-order1">
                                                <li class="dropdown-item">
                                                    <a href="#">Ubah</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">Hapus</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
