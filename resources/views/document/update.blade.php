@extends('layout')
@section('title', 'Edit Data Dokumen '. $document->type->name)
@section('section')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.document', $document->type->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Data Dokumen <b>{{ $document->type->name }}</b></h1>
        </div>
        <div class="section-body">
            <form action="{{ route('update.document', $document->id) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label style="font-size: 16px" class="d-block">Instansi</label>
                            <textarea name="instansi" class="form-control @error('instansi') is-invalid @enderror" cols="30" rows="10" autofocus>{{ $document->agency }}</textarea>
                            @error('instansi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label style="font-size: 16px" class="d-block">Nomor Dokumen</label>
                                <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor" value="{{ $document->number }}">
                                @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <label style="font-size: 16px" class="d-block">Judul Dokumen</label>
                                <textarea name="judul" class="form-control @error('judul') is-invalid @enderror" cols="30" rows="10" autofocus>{{ $document->title }}</textarea>
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px" class="d-block">Keterangan</label>
                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" cols="30" rows="10" autofocus>{{ $document->description }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px" class="d-block">Mitra</label>
                            <textarea name="mitra" class="form-control @error('mitra') is-invalid @enderror" cols="30" rows="10" autofocus>{{ $document->partner }}</textarea>
                            @error('mitra')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label style="font-size: 16px" class="d-block">Kegiatan</label>
                            <textarea name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" cols="30" rows="10" autofocus>{{ $document->activity }}</textarea>
                            @error('kegiatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label style="font-size: 16px" class="d-block">Tanggal Awal</label>
                                <input type="date" class="form-control @error('tglAwal') is-invalid @enderror" name="tglAwal" value="{{ $document->start_date }}">
                                @error('tglAwal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <label style="font-size: 16px" class="d-block">Tanggal Akhir</label>
                                <input type="date" class="form-control @error('tglAkhir') is-invalid @enderror" name="tglAkhir"  value="{{ $document->end_date }}">
                                @error('tglAkhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
