@extends('layout')
@section('title', 'Data Mitra Kerja')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data <b>Mitra Kerja</b></h1>
        <div class="section-header-button">
            <a href="{{ route('create.partner') }}" class="btn btn-primary"
                title="Tambah Daftar Pertanyaan">Tambah</a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Instansi</th>
                                <th>Alamat</th>
                                <th>Negara</th>
                                <th>Nomor Telepon</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>
                                        <div class="sort-handler ui-sortable-handle text-center">
                                            {{ $loop->index+1 }}
                                        </div>
                                    </td>
                                    <td>{{ $data->agency_name }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->country }}</td>
                                    <td>+62{{ $data->phone }}</td>
                                    <td>{{ $data->website }}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-success" title="Detail Data"><i class="fa fa-eye"></i></a> --}}
                                        <a href="{{ route('edit.partner', $data->id) }}" class="btn btn-warning" title="Edit Data"><i class="far fa-edit"></i></a>
                                        <form id="delete" action="{{ route('destroy.partner', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                                data-toggle="tooltip" title="Hapus Data"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
