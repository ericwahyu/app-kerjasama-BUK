@extends('layout')
@section('title', 'Edit Data Mitra Kerja')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.partner') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data <b>Mitra Kerja</b></h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.partner', $partner->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Nama Instansi</label>
                            <input type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{ $partner->agency_name }}" autofocus>
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
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="10">{{ $partner->address }}</textarea>
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
                                <option value="{{ $partner->country }}" selected>{{ $partner->country }}</option>
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
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $partner->phone }}">
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
                            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $partner->website }}">
                            @error('webite')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
