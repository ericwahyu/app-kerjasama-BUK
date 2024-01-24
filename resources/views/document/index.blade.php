@extends('layout')
@section('title', 'Data Dokumen '. $type->name)
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Dokumen <b>{{ $type->name }}</b></h1>
        <div class="section-header-button">
            <a href="{{ route('create.document', $type->id) }}" class="btn btn-primary"
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
                                <th>Jenis Dokumen</th>
                                <th>Instansi</th>
                                <th>Nomor Dokumen</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Mitra</th>
                                <th>Kegiatan</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Berakhir</th>
                                <th>Status</th>
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
                                    <td>{{ $data->type->name }}</td>
                                    <td>{{ $data->agency }}</td>
                                    <td>{{ $data->number }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->partner }}</td>
                                    <td>{{ $data->activity }}</td>
                                    <td>{{ IdDateFormatter::format($data->start_date, IdDateFormatter::COMPLETE) }}</td>
                                    <td>{{ IdDateFormatter::format($data->end_date, IdDateFormatter::COMPLETE) }}</td>
                                    @if ($data->status == 0)
                                        <td><span class="badge badge-danger">Kadaluarsa</span></td>
                                    @elseif ($data->status == 1)
                                        <td><span class="badge badge-success">Aktif</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('show.document', $data->id) }}" class="btn btn-success" title="Detail Data"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit.document', $data->id) }}" class="btn btn-warning" title="Edit Data"><i class="far fa-edit"></i></a>
                                        <form id="delete" action="{{ route('destroy.document', $data->id) }}" method="post">
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
