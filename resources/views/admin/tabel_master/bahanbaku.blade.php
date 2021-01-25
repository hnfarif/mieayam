@extends('template_admin.layout')


@section('tabel', 'active show')
@section('master', 'active show')
@section('bahanbaku', 'active show')
@section('content')



    <div class="content">

        <h1>Tabel Bahan Baku</h1>

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
                <li class="breadcrumb-item" aria-current="page">Tabel Bahan Baku</li>
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
                        <h2>Data Bahan Baku</h2>
                        <div class="date-range-report ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-dark font-weight-bold">ID Bahan Baku</th>
                                    <th class="text-dark font-weight-bold">Nama Bahan Baku</th>
                                    <th class="text-dark font-weight-bold">Stok</th>
                                    <th class="text-dark font-weight-bold">Satuan</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bahanbaku as $item)
                                    <tr>
                                        <td><b>{{ $item->id }}</b></td>
                                        <td>
                                            <b>{{ $item->nama_bahan_baku }} </b>
                                        </td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->satuan }}</td>
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
                                                        <form action="{{ url('admin/bahanbaku/' . $item->id) }}"
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
                    <form action="bahanbaku/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Bahan Baku</label><br />
                            <input type="text" name="nama_bahan_baku"
                                class="form-control @error('nama_bahan_baku') is-invalid @enderror" autocomplete="off"
                                value="{{ old('nama_bahan_baku') }}">
                            @error('nama_bahan_baku')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Stok Bahan Baku</label><br />
                            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                value="{{ old('stok') }}">
                            @error('stok')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Satuan</label><br />
                            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                                autocomplete="off" value="{{ old('satuan') }}">
                            @error('satuan')
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

    <!-- Update Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="bahanbaku/{{ $item->id ?? '' }}/edit" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Bahan Baku</label><br />
                            <input type="text" name="nama_bahan_baku"
                                class="form-control @error('nama_bahan_baku') is-invalid @enderror" autocomplete="off"
                                id="ed_nama_bahan_baku">
                            @error('nama_bahan_baku')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Stok Bahan Baku</label><br />
                            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                id="ed_stok">
                            @error('stok')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Satuan</label><br />
                            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                                autocomplete="off" id="ed_satuan">
                            @error('satuan')
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
                    url: '/admin/bahanbaku/' + edit_id + '/edit',
                    method: 'GET',
                    success: function(data) {
                        $('#ed_nama_bahan_baku').val(data.nama_bahan_baku);
                        $('#ed_stok').val(data.stok);
                        $('#ed_satuan').val(data.satuan);
                        $('#editModal').modal('show');

                    }
                });
            });
        });

    </script>
@endsection
