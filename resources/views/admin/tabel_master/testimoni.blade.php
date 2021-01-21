@extends('template_admin.layout')

@section('tabel', 'active show ')
@section('master', 'active show ')
@section('testimoni', 'active show')

@section('content')

    <div class="content">

        <h1>Tabel Testimoni</h1>

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
                    tabel Master
                </li>
                <li class="breadcrumb-item" aria-current="page">Tabel Testimoni</li>
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
                        <h2>Data Testimoni</h2>
                        <div class="date-range-report ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-dark font-weight-bold">ID Testimoni</th>
                                    <th class="text-dark font-weight-bold">ID User</th>
                                    <th class="text-dark font-weight-bold">Isi Testimoni</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimoni as $item)
                                    <tr>
                                        <td><b>{{ $item->id }}</b></td>
                                        <td>
                                            <b>{{ $item->id_user }}</b>
                                        </td>
                                        <td>{{ $item->isi_testimoni }}</td>
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
                                                        <form action="{{ url('admin/testimoni/' . $item->id) }}"
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="testimoni/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Id User</label><br />
                            <input type="text" name="id_user" class="form-control @error('id_user') is-invalid @enderror"
                                autocomplete="off" value="{{ old('id_user') }}">
                            @error('id_user')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Isi Testimoni</label><br />
                            <textarea name="isi_testimoni" class="form-control @error('isi_testimoni') is-invalid @enderror"
                                value="{{ old('isi_testimoni') }}"></textarea>
                            @error('isi_testimoni')
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
                    <form action="testimoni/{{ $item->id ?? '' }}/edit" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="">Id User</label><br />
                            <input type="text" name="id_user" class="form-control @error('id_user') is-invalid @enderror"
                                autocomplete="off" id="ed_id_user">
                            @error('id_user')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Isi Testimoni</label><br />
                            <textarea name="isi_testimoni" id="ed_testimoni"
                                class="form-control @error('isi_testimoni') is-invalid @enderror"></textarea>
                            @error('isi_testimoni')
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
                    url: '/admin/testimoni/' + edit_id + '/edit',
                    method: 'GET',
                    success: function(data) {
                        $('#ed_id_user').val(data.id_user);
                        $('#ed_testimoni').val(data.isi_testimoni);
                        $('#editModal').modal('show');

                    }
                });
            });
        });

    </script>
@endsection
