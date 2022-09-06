@extends('layouts.app')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('') }}vendor/chart.js/dist/Chart.min.css">
@endsection

@section('content')
    <div class="title">
        Dashboard
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Hi, Selamat Datang <b>{{ Auth::user()->name }}</b></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}vendor/chart.js/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/page/index.js"></script>
@endsection
