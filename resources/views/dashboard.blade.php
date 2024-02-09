@extends('layout')
@section('title','Dashboard')
@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            @if (Auth::user()->hasAnyRole('admin'))
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Pengguna</h4>
                                </div>
                                <div class="card-body">
                                    {{ $countUSER }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('index.document', 1) }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Memorandum of Aggreement (MoA)</h4>
                            </div>
                            <div class="card-body">
                                {{ $countMOA }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('index.document', 2) }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Memorandum of Understanding (MoU)</h4>
                            </div>
                            <div class="card-body">
                                {{ $countMOU }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('index.document', 3) }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Implementation Arrangement (IA)</h4>
                            </div>
                            <div class="card-body">
                                {{ $countIA }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
