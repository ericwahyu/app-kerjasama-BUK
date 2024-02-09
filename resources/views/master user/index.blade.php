@extends('layout')
@section('title', 'Data Master User')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Master User</h1>
        {{-- <div class="section-header-button">
            <a href="#" class="btn btn-primary"
                title="Tambah Daftar Pertanyaan">Tambah</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                {{-- <th>Action</th> --}}
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
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->email }}</td>
                                    @if ($data->getRoleNames()->first() == 'admin')
                                        <td><span class="badge badge-danger">ADMIN</span></td>
                                    @elseif ($data->getRoleNames()->first() == 'user')
                                        <td><span class="badge badge-success">USER</span></td>
                                    @endif
                                    {{-- <td>
                                        <form id="delete" action="#" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="btn btn-warning" title="Edit Data"><i class="far fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                                data-toggle="tooltip" title="Hapus Data"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td> --}}
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
