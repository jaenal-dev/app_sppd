@extends('layouts.app')

@section('title', 'Halaman Laporan SPPD')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Laporan SPPD
    </div>

    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-end">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table display text-center table-sm">
                                <thead>
                                    <tr>
                                        <th><small>Nomor Surat</small></th>
                                        <th><small>tujuan</small></th>
                                        <th><small>Laporan</small></th>
                                        <th><small>Tgl Pergi <br> s/d <br> Tgl Kembali</small></th>
                                        <th><small>Aksi</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sppds as $sppd)
                                        <tr>
                                            <td class="form-text">{{ $sppd->nomor }}</small></td>
                                            <td class="form-text">{{ $sppd->spt->tujuan }}</small></td>
                                            <td class="form-text">{!! $sppd->laporan !!}</small></td>
                                            <td class="form-text">
                                                {{ date('d/F/Y', strtotime($sppd->sppd_get->tgl_pergi ?? '')) }}<br>s/d<br>{{ date('d/F/Y', strtotime($sppd->sppd_get->tgl_pulang ?? '')) }}
                                            </td>
                                            <td>
                                                <div class="py-2 mb-0" role="button">
                                                    @if (Auth::user()->role == 1)
                                                    <form action="{{ route('report.destroy', $sppd) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                    @else
                                                    <a href="{{ route('report.print') }}" class="btn btn-primary" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                                                    {{-- <a href="{{ route('report.print') }}" class="btn btn-success" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye"></i></a> --}}
                                                    <a href="{{ route('report.edit', $sppd) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    {{-- <form action="{{ route('report.destroy', $sppd) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                                                    </form> --}}
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
