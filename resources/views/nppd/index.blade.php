@extends('layouts.app')

@section('title', 'Data NPPD')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Data NPPD (Nota Permintaan Perjalanan Dinas)
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-end">
                        <a href="{{ route('nppd.create') }}" class="btn btn-primary mb-2" role="button"><i class="fas fa-plus"></i>
                        Tambah</a>
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
                                    @foreach ($nppds as $nppd)
                                        <tr data-entry-id="{{ $nppd->id }}">
                                            <td class="form-text">{{ $nppd->nomor }}</td>
                                            <td class="form-text">
                                                {{ $nppd->user()->get()->implode('name', ', ') }}
                                            </td>
                                            <td class="form-text">
                                                {{ $nppd->location()->get()->implode('name', ', ') }}
                                            </td>
                                            <td class="form-text">
                                                {{ $nppd->transport()->get()->implode('name', ', ') }}
                                            </td>
                                            <td class="form-text">{{ $nppd->tujuan }}</td>
                                            <td class="form-text">
                                                {{ date('d/F/Y', strtotime($nppd->tgl_pergi)) }}<br>s/d<br>{{ date('d/F/Y', strtotime($nppd->tgl_pulang)) }}
                                            </td>
                                            @if (Auth::user()->role == 1)
                                            <td>
                                                <div class="btn-group pt-2">
                                                    @if ($nppd->status == 1)
                                                        <a href="#" class="btn btn-success btn-rounded" data-toggle="tooltip" title="Approved"><i class="fa fa-check"></i></a>
                                                    @else
                                                        <a href="#" class="btn btn-warning btn-rounded" data-toggle="tooltip" title="Pending"><i class="fa fa-clock"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                            @endif
                                            <td>
                                                <div class="btn-group py-2 mb-0" role="button">
                                                    @if (Auth::user()->role == 1)
                                                        <a href="#" class="btn btn-primary" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                                                        <a href="{{ route('nppd.edit', $nppd) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('nppd.destroy', $nppd) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('report.create', $nppd->id) }}" class="btn btn-success" data-toggle="tooltip" title="Buat Laporan"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
