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

        <button type="button" class="mb-1 btn btn-primary mt-5 text-white" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class=" mdi mdi-plus-box-multiple mr-1"></i>
            Tambah data</button>

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
                                    <th class="text-dark font-weight-bold">ID BahanBaku</th>
                                    <th class="text-dark font-weight-bold">Jumlah</th>
                                    <th class="text-dark font-weight-bold">Satuan</th>
                                    <th class="text-dark font-weight-bold">Total Harga</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pembelian as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            {{ $item->id_bahan_baku }}
                                        </td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->satuan }}</td>
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
                                                        <form action="{{ url('admin/pembelian-material/' . $item->id) }}"
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
                    <form action="pembelian-material/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">ID Bahan Baku</label><br />
                            <select class="form-control" aria-label="Default select example" name="id_bahan_baku">
                                <option selected>Pilih Id Menu</option>
                                @foreach ($bahanbaku as $bb)
                                    <option value="{{ $bb->id }}">
                                        {{ $bb->id . '-' . $bb->nama_bahan_baku }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_bahan_baku')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah</label><br />
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                                autocomplete="off" value="{{ old('jumlah') }}">
                            @error('jumlah')
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

                        <div class="form-group">
                            <label for="">Total Harga</label><br />
                            <input type="number" name="total_harga"
                                class="form-control @error('total_harga') is-invalid @enderror" autocomplete="off"
                                value="{{ old('total_harga') }}">
                            @error('total_harga')
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
                    <form action="pembelian-material/{{ $item->id ?? '' }}/edit" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="">ID Bahan Baku</label><br />
                            <select class="form-control" aria-label="Default select example" name="id_bahan_baku"
                                id="ed_id_bahan_baku">
                                <option selected>Pilih Id Menu</option>
                                @foreach ($bahanbaku as $bb)
                                    <option value="{{ $bb->id }}">
                                        {{ $bb->id . '-' . $bb->nama_bahan_baku }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_bahan_baku')
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
                            <label for="">Satuan</label><br />
                            <input type="text" name="satuan" id="ed_satuan"
                                class="form-control @error('satuan') is-invalid @enderror" autocomplete="off">
                            @error('satuan')
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
                    url: '/admin/pembelian-material/' + edit_id + '/edit',
                    method: 'GET',
                    success: function(data) {
                        $('#ed_id_bahan_baku').val(data.id_bahan_baku);
                        $('#ed_jumlah').val(data.jumlah);
                        $('#ed_satuan').val(data.satuan);
                        $('#ed_total_harga').val(data.total_harga);
                        $('#editModal').modal('show');

                    }
                });
            });
        });

    </script>
@endsection
