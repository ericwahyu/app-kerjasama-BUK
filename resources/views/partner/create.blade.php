@extends('layout')
@section('title', 'Tambah Data Mitra Kerja')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.partner') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data <b>Mitra Kerja</b></h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.partner') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Nama Instansi</label>
                            <input type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{ old('instansi') }}" autofocus>
                            @error('instansi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="10">{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Negara</label>
                            <select class="form-control select2 @error('negara') is-invalid @enderror" name="negara">
                                <option disabled selected>-- Pilih Negara --</option>
                                @foreach ($countries as $countries)
                                    <option value="{{ $countries->id }}" {{ old('negara') == $countries->id ? "selected" : "" }}>{{ $countries->name }}</option>
                                @endforeach
                            </select>
                            @error('negara')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Nomor Handphone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}">
                            @error('webite')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
