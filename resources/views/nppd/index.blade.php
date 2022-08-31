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
                            <table id="example2" class="table display text-center table-md">
                                <thead>
                                    <tr>
                                        <th><small>No. Surat</small></th>
                                        <th><small>Dibuat</small></th>
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
                                                {{ date('d/F/Y', strtotime($nppd->created_at)) }}
                                            </td>
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
                                                <td class="p-3">
                                                    @if ($nppd->status == 1)
                                                        <span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalCenter" data-toggle="tooltip" title="Disetujui"><i class="fa fa-check"></i></span>
                                                    @elseif ($nppd->status == 2)
                                                        <span class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalCenter" data-toggle="tooltip" title="Ditolak"><i class="fa fa-times"></i></span>
                                                    @else
                                                        <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#verticalCenter{{ $nppd->id }}" data-toggle="tooltip" title="Pending"><i class="fa fa-clock"></i></span>
                                                    @endif
                                                </td>
                                            @endif

                                            <td class="p-3">
                                                <div class="btn-group" role="button">
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

        @if ($nppds->count())
        <div style="height: 3px; background: 1px black"></div>

        <div class="row same-height mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="modal-header text-center">
                        <h6>Keterangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display table-sm text-center">
                                @foreach ($nppds as $nppd)
                                    <thead>
                                        <tr>
                                            <th class="form-text">Nomor Surat</th>
                                            <th class="form-text">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="form-text">{{ $nppd->nomor }}</td>
                                            <td class="form-text">{{ $nppd->keterangan }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else

        @endif

    </div>

    @include('nppd._status')

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
