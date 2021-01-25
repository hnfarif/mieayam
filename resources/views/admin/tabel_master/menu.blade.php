@extends('template_admin.layout')


@section('tabel', 'active show')
@section('master', 'active show')
@section('menu', 'active show')
@section('content')



    <div class="content">

        <h1>Tabel Menu</h1>

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
                    Tabel Master
                </li>
                <li class="breadcrumb-item" aria-current="page">Tabel Menu</li>
            </ol>
        </nav>

        <button type="button" class="mb-1 btn btn-primary mt-5 text-white" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class=" mdi mdi-plus-box-multiple mr-1"></i>
            Tambah data</button>

        <div class="row mt-3">

            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Data Menu</h2>
                        <div class="date-range-report ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-dark font-weight-bold">ID Menu</th>
                                    <th class="text-dark font-weight-bold">Nama Menu</th>
                                    <th class="text-dark font-weight-bold">Harga Menu</th>
                                    <th class="text-dark font-weight-bold">Jenis Menu</th>
                                    <th class="text-dark font-weight-bold">Stock</th>
                                    <th class="text-dark font-weight-bold">Gambar Menu</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($menu as $item)


                                    <tr>
                                        <td><b>{{ $item->id }}</b></td>
                                        <td><b>{{ $item->nama_menu }}</b></td>
                                        <td><b>{{ $item->harga_menu }}</b></td>
                                        <td><b>{{ $item->jenis_menu }}</b></td>
                                        <td><b>{{ $item->stock }}</b></td>
                                        <td><img width="150px" src="{{ url('/data_images/' . $item->gambar_menu) }}" alt="">
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                    id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" data-display="static"></a>
                                                <ul class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdown-recent-order1">
                                                    <li class="dropdown-item">
                                                        <button type="button" class="btn btn-info edit"
                                                            data-id="{{ $item->id }}">
                                                            <span class="mdi mdi-pencil"></span>
                                                            Ubah
                                                        </button>
                                                    </li>

                                                    <li class="dropdown-item">
                                                        <form action="{{ url('admin/menu/' . $item->id) }}" method="POST">
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

                                    @empty($item)
                                        <tr>
                                            <td colspan="6"> No records found</td>
                                        </tr>
                                    @endempty
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="menu/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Menu</label><br />
                            <input type="text" name="nama_menu"
                                class="form-control @error('nama_menu') is-invalid @enderror" autocomplete="off"
                                value="{{ old('nama_menu') }}">
                            @error('nama_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Harga Menu</label><br />
                            <input type="number" name="harga_menu"
                                class="form-control @error('harga_menu') is-invalid @enderror"
                                value="{{ old('harga_menu') }}">
                            @error('harga_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Menu</label><br />
                            <input type="text" name="jenis_menu"
                                class="form-control @error('jenis_menu') is-invalid @enderror" autocomplete="off"
                                value="{{ old('jenis_menu') }}">
                            @error('jenis_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Stock</label><br />
                            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                                min="0" value="{{ old('stock') }}">
                            @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Gambar Menu</label><br />
                            <input type="file" name="gambar_menu"
                                class="form-control @error('gambar_menu') is-invalid @enderror"
                                value="{{ old('gambar_menu') }}">
                            @error('gambar_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary btn-pill" value="Insert">
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModelLabel">Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="menu/{{ $item->id ?? '' }}/edit" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Menu</label><br />
                            <input type="text" name="nama_menu"
                                class="form-control @error('nama_menu') is-invalid @enderror" autocomplete="off"
                                id="ed_nama_menu">
                            @error('nama_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Harga Menu</label><br />
                            <input type="number" name="harga_menu"
                                class="form-control @error('harga_menu') is-invalid @enderror" id="ed_harga_menu">
                            @error('harga_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Menu</label><br />
                            <input type="text" name="jenis_menu"
                                class="form-control @error('jenis_menu') is-invalid @enderror" autocomplete="off"
                                id="ed_jenis_menu">
                            @error('jenis_menu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Stock</label><br />
                            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                                min="0" id="ed_stock_menu">
                            @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Gambar Menu</label><br />
                            <input type="file" name="gambar_menu" class="form-control" id="ed_gambar_menu">

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
    {{-- End Edit Modal --}}

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.edit').click(function() {

                var edit_id = $(this).data('id');

                $.ajax({
                    url: '/admin/menu/' + edit_id + '/edit',
                    method: 'GET',
                    success: function(data) {
                        $('#ed_nama_menu').val(data.nama_menu);
                        $('#ed_harga_menu').val(data.harga_menu);
                        $('#ed_jenis_menu').val(data.jenis_menu);
                        $('#ed_stock_menu').val(data.stock);
                        $('#editmodal').modal('show');

                    }
                });
            });
        });

    </script>
@endsection
