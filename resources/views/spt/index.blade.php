@extends('layouts.app')

@section('title', 'Surat Tugas')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Surat Tugas
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-end">
                        @can('read')
                            <a href="{{ route('spt.create') }}" class="btn btn-primary mb-2" role="button"><i class="fas fa-plus"></i>Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">

                        @if ($spts->count())
                            <div class="table-responsive">
                                <table id="example2" class="table display text-center table-md">
                                    <thead>
                                        <tr>
                                            <th><small>Dibuat</small></th>
                                            <th style="width: 21%"><small>Penugasan <br> Kepada</small></th>
                                            <th><small>Lokasi</small></th>
                                            <th><small>Maksud <br> Perjalanan Dinas</small></th>
                                            <th><small>Tgl Pergi <br> s/d <br> Tgl Kembali</small></th>
                                            @can('read')
                                                <th><small>SPPD</small></th>
                                            @endcan
                                            <th><small>Aksi</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spts as $spt)
                                            <tr data-entry-id="{{ $spt->id }}">
                                                <td class="form-text">
                                                    {{ date('d F Y', strtotime($spt->created_at)) }}
                                                </td>
                                                <td class="form-text">
                                                    {{ $spt->user()->get()->implode('name', ', ') }}
                                                </td>
                                                <td class="form-text">
                                                    {{ $spt->location()->get()->implode('name', ', ') }}
                                                </td>
                                                <td class="form-text">{{ $spt->tujuan }}</td>
                                                <td class="form-text">
                                                    {{ date('d F Y', strtotime($spt->tgl_pergi)) }}<br>s/d<br>{{ date('d F Y', strtotime($spt->tgl_pulang)) }}
                                                </td>
                                                @can('read')
                                                    <td class="p-3">
                                                        <div class="btn-group" role="button">
                                                            <a href="{{ route('sppd.create', $spt) }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </td>
                                                @endcan

                                                <td class="p-3">
                                                    <div class="btn-group" role="button">
                                                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                                            <a href="{{ route('spt.edit', $spt) }}" class="btn btn-warning mx-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <button class="btn btn-danger" id="swall-delete" data-id="{{ $spt->id }}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                                                        @else
                                                            {{-- <a href="{{ route('spt.print', $spt) }}" class="btn btn-primary mx-1" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a> --}}
                                                            <a href="{{ route('spt.show', $spt) }}" class="btn btn-success" data-toggle="tooltip" title="Buat Laporan"><i class="fas fa-eye"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h5 class="text-center">Data Masih Kosong</h5>
                        @endif
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

    <script>
        // const confirmation = document.getElementById('swall-delete')
        $('#example2').on('click', '#swall-delete', function () {
            let data = $(this).data()
            let spt = data.id

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: `{{ url('spt') }}/${spt}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res){
                            $(document).ajaxStop(function(){
                                setTimeout("window.location = 'spt'",1000);
                            });
                            Swal.fire(
                                'Deleted!',
                                res.message,
                                res.status
                            )
                        }
                    })
                }
            })
        })
    </script>
@endsection
