@extends('layout')
@section('title', 'Data Filter Dokumen')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Filter Dokumen</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('filter.document') }}" method="get">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label style="font-size: 16px">Tahun Dokumen</label>
                                <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" min="2010" max="3000" value="{{ $request->tahun }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label style="font-size: 16px">Status Dokumen</label>
                                <select class="form-control" name="status">
                                    <option disabled selected>-- Pilih Status Dokumen --</option>
                                    <option value="1" {{ $request->status == '1' ? "selected" : "" }}>Aktif</option>
                                    <option value="0" {{ $request->status == '0' ? "selected" : "" }}>Kadaluarsa</option>
                                    <option value="" >Hapus Filter</option>
                                </select>
                                {{-- <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" min="2020" max="3000" value="{{ $request->tahun }}"> --}}
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary" style="margin-top: 35px">Filter Data</button>
                                {{-- <a href="" class="btn btn-info" style="margin-top: 35px; margin-left: 20px">Export Excel</a> --}}
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filter_document as $data)
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
