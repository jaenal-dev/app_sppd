@extends('layouts.app')

@section('title', 'Data SPPD')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Data Transport
        <div class="card-header text-end">
            <a href="{{ route('transport.create') }}" class="btn btn-primary mb-2" role="button"><i class="fas fa-plus"></i>Tambah</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-responsive">
                            <table id="example2" class="table display text-center table-sm">
                                <thead>
                                    <tr>
                                        <th><small>No</small></th>
                                        <th><small>Jenis Transport</small></th>
                                        <th><small>Aksi</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transports as $transport)
                                        <tr data-entry-id="{{ $transport->id }}">
                                            <td class="form-text">{{ $loop->iteration }}</td>
                                            <td class="form-text">{{ $transport->name }}</small></td>
                                            <td>
                                                <a href="{{ route('transport.edit', $transport) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('transport.destroy', $transport) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                                                </form>
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
