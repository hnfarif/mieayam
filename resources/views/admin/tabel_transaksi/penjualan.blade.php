@extends('template_admin.layout')


@section('tabel', 'active show')
@section('transaksi', 'active show')
@section('penjualan', 'active show')
@section('content')

    <div class="content">

        <h1>Tabel Penjualan</h1>

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
                <li class="breadcrumb-item" aria-current="page">Tabel Penjualan</li>
            </ol>
        </nav>

        <div class="row mt-5">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Data Penjualan</h2>
                        <div class="date-range-report ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-dark font-weight-bold">ID Penjualan</th>
                                    <th class="text-dark font-weight-bold">ID User</th>
                                    <th class="text-dark font-weight-bold">ID Menu</th>
                                    <th class="text-dark font-weight-bold">Jumlah </th>
                                    <th class="text-dark font-weight-bold">Total Harga</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->id_user }}</td>
                                        <td>{{ $item->id_menu }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                    id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdown-recent-order1">
                                                    <li class="dropdown-item">
                                                        <button type="button" class="btn btn-info editMaterial"
                                                            data-id="{{ $item->id }}">
                                                            <span class="mdi mdi-pencil"></span>
                                                            Ubah
                                                        </button>
                                                    </li>

                                                    <li class="dropdown-item">
                                                        <form action="{{ url('admin/penjualan/' . $item->id) }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf

                                                            <button type="submit" class="btn btn-danger">
                                                                <span class="mdi mdi-delete"></span> Hapus
                                                            </button>

                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Update Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="penjualan/{{ $item->id ?? '' }}/edit" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="">Id User</label><br />
                            <input type="text" name="id_user" id="ed_id_user"
                                class="form-control @error('id_user') is-invalid @enderror" autocomplete="off">
                            @error('id_user')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Id Menu</label><br />
                            <input type="text" name="id_menu" id="ed_id_menu"
                                class="form-control @error('id_menu') is-invalid @enderror" autocomplete="off">
                            @error('id_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah</label><br />
                            <input type="number" name="jumlah" id="ed_jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror" autocomplete="off">
                            @error('jumlah')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Total Harga</label><br />
                            <input type="number" name="total_harga" id="ed_total_harga"
                                class="form-control @error('total_harga') is-invalid @enderror" autocomplete="off">
                            @error('total_harga')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary btn-pill" value="Ubah">
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('.editMaterial').click(function() {

                var edit_id = $(this).data('id');

                $.ajax({
                    url: '/admin/penjualan/' + edit_id + '/edit',
                    method: 'GET',
                    success: function(data) {
                        $('#ed_id_user').val(data.id_user);
                        $('#ed_id_menu').val(data.id_menu);
                        $('#ed_jumlah').val(data.jumlah);
                        $('#ed_total_harga').val(data.total_harga);
                        $('#editModal').modal('show');

                    }
                });
            });
        });

    </script>
@endsection
