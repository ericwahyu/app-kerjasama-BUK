@extends('layout')
@section('title', 'Detail Data Dokumen '. $dokumen->jenis->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.dokumen',  $dokumen->jenis->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Data Dokumen <b>{{ $dokumen->jenis->nama }}</b></h1>
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
                                    <td>{{ $dokumen->instansi }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Dokumen</td>
                                    <td>:</td>
                                    <td>{{ $dokumen->jenis->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Dokumen</td>
                                    <td>:</td>
                                    <td>{{ $dokumen->nomor }}</td>
                                </tr>
                                <tr>
                                    <td>Judul Dokumen</td>
                                    <td>:</td>
                                    <td>{{ $dokumen->judul }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $dokumen->keterangan }}</td>
                                </tr>
                                <tr>
                                    <td>Mitra</td>
                                    <td>:</td>
                                    <td>{{ $dokumen->mitra }}</td>
                                </tr>
                                <tr>
                                    <td>Kegiatan</td>
                                    <td>:</td>
                                    <td>{{ $dokumen->kegiatan }}</td>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td> @if ($dokumen->status == 0)
                                        <span class="badge badge-danger">Kadaluarsa</span>
                                    @elseif ($dokumen->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                    @endif</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Awal</td>
                                    <td>:</td>
                                    <td>{{ IdDateFormatter::format($dokumen->tanggal_awal, IdDateFormatter::COMPLETE) }}</td>
                                <tr>
                                <tr>
                                    <td>Tanggal Berakhir</td>
                                    <td>:</td>
                                    <td>{{ IdDateFormatter::format($dokumen->tanggal_berakhir, IdDateFormatter::COMPLETE) }}</td>
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
