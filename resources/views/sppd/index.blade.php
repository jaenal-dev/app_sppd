@extends('layouts.app')

@section('title', 'Data NPPD')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Data SPPD
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-end">
                        @can('read')
                            <a href="{{ route('sppd.create') }}" class="btn btn-primary mb-2" role="button"><i
                                    class="fas fa-plus"></i>
                                Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table display text-center table-sm">
                                <thead>
                                    <tr>
                                        <th><small>No. Surat</small></th>
                                        <th><small>Penugasan <br> Kepada</small></th>
                                        <th><small>Lokasi</small></th>
                                        <th><small>Transportasi</small></th>
                                        <th><small>Maksud <br> Perjalanan Dinas</small></th>
                                        <th><small>Tgl Pergi <br> s/d <br> Tgl Kembali</small></th>
                                        @if (Auth::user()->role == 1)
                                            <th><small>Status</small></th>
                                        @endif
                                        <th><small>Aksi</small></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}assets/js/page/datatables.js"></script>

    @stack('js')
    <script>
        DataTable.init()
    </script>
@endsection
