@extends('layouts.app')

@section('title', 'Nota Dinas')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Nota Dinas
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-end">
                        @can('read')
                            <a href="{{ route('nppd.create') }}" class="btn btn-primary mb-2" role="button"><i class="fas fa-plus"></i>Tambah</a>
                        @endcan
                    </div>
                    <div class="card-body">

                        @if ($nppds->count())
                            <div class="table-responsive">
                                <table id="example2" class="table display text-center table-md">
                                    <thead>
                                        <tr>
                                            <th><small>Dibuat</small></th>
                                            <th><small>No. Surat Tugas</small></th>
                                            <th><small>Tujuan</small></th>
                                            <th><small>Tanggal Pergi <br> s/d <br> Tanggal Kembali</small></th>
                                            <th><small>Status</small></th>
                                            <th><small>Aksi</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nppds as $nppd)
                                            <tr data-entry-id="{{ $nppd->id }}">
                                                <td class="form-text">
                                                    {{ date('d F Y', strtotime($nppd->created_at)) }}
                                                </td>
                                                <td class="form-text">
                                                    {{ $nppd->nomor }}
                                                </td>
                                                <td class="form-text">{{ $nppd->tujuan }}</td>
                                                <td class="form-text">
                                                    {{ date('d F Y', strtotime($nppd->tgl_pergi)) }}<br>s/d<br>{{ date('d F Y', strtotime($nppd->tgl_pulang)) }}
                                                </td>

                                                <td class="p-3">
                                                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                                        @if ($nppd->status == 1)
                                                            <span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalCenter" data-toggle="tooltip" title="Disetujui"><i class="fa fa-check"></i></span>
                                                        @elseif ($nppd->status == 2)
                                                            <span class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalCenter" data-toggle="tooltip" title="Ditolak"><i class="fa fa-times"></i></span>
                                                        @else
                                                            <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#verticalCenter{{ $nppd->id }}" data-toggle="tooltip" title="Pending"><i class="fa fa-clock"></i></span>
                                                        @endif

                                                    @else

                                                        @if ($nppd->status == 1)
                                                            <span class="badge rounded-pill bg-success" data-toggle="tooltip" title="Disetujui"></i>Disetujui</span>
                                                        @elseif ($nppd->status == 2)
                                                            <span class="badge rounded-pill bg-danger" data-toggle="tooltip" title="Ditolak"></i>Ditolak</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-warning" data-toggle="tooltip" title="Pending"></i>Pending</span>
                                                        @endif

                                                    @endif

                                                </td>

                                                <td class="p-3">
                                                    <div class="btn-group" role="button">
                                                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                                            {{-- <a href="{{ route('nppd.print', $nppd) }}" class="btn btn-primary mx-1" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a> --}}
                                                            <a href="{{ route('nppd.edit', $nppd) }}" class="btn btn-warning mx-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <button class="btn btn-danger" id="swall-delete" data-id="{{ $nppd->id }}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                                                        @else
                                                            <a href="{{ route('nppd.print', $nppd) }}" class="btn btn-primary mx-1" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                                                            {{-- <a href="{{ route('report.create', $nppd) }}" class="btn btn-success" data-toggle="tooltip" title="Buat Laporan"><i class="fas fa-pencil-alt"></i></a> --}}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h5 class="text-center">Nota Masih Kosong</h5>
                        @endif
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
                            <table id="table-nppd" class="table display table-sm text-center">
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
    <script>
        // const confirmation = document.getElementById('swall-delete')
        $('#example2').on('click', '#swall-delete', function () {
            let data = $(this).data()
            let nppd = data.id

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
                        url: `{{ url('nppd') }}/${nppd}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res){
                            $(document).ajaxStop(function(){
                                setTimeout("window.location = 'nppd'",1000);
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
