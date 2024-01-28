@extends('layout')
@section('title', 'Detail Data Dokumen '. $document->type->name)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.document',  $document->type->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Data Dokumen <b>{{ $document->type->name }}</b></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Instansi</td>
                                    <td>:</td>
                                    <td>{{ $document->agency }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Dokumen</td>
                                    <td>:</td>
                                    <td>{{ $document->type->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Dokumen</td>
                                    <td>:</td>
                                    <td>{{ $document->number }}</td>
                                </tr>
                                <tr>
                                    <td>Judul Dokumen</td>
                                    <td>:</td>
                                    <td>{{ $document->title }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $document->description }}</td>
                                </tr>
                                <tr>
                                    <td>Mitra</td>
                                    <td>:</td>
                                    <td>{{ $document->partner }}</td>
                                </tr>
                                <tr>
                                    <td>Kegiatan</td>
                                    <td>:</td>
                                    <td>{{ $document->activity }}</td>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    @if ($document->status === 'aktif')
                                        <td><span class="badge badge-success">Aktif</span></td>
                                    @elseif ($document->status == 'kadaluarsa')
                                        <td><span class="badge badge-danger">Kadaluarsa</span></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Tanggal Awal</td>
                                    <td>:</td>
                                    <td>{{ IdDateFormatter::format($document->start_date, IdDateFormatter::COMPLETE) }}</td>
                                <tr>
                                <tr>
                                    <td>Tanggal Berakhir</td>
                                    <td>:</td>
                                    <td>{{ IdDateFormatter::format($document->end_date, IdDateFormatter::COMPLETE) }}</td>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
