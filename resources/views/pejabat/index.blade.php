@extends('layouts.app')

@section('title', 'Data Pejabat')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Data pejabat
        <div class="card-header text-end">
            <a href="{{ route('pejabat.create') }}" class="btn btn-primary mb-2" role="button"><i class="fas fa-plus"></i>Tambah</a>
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
                                        <th><small>Nama</small></th>
                                        <th><small>NIP</small></th>
                                        <th><small>Pangkat/Gol</small></th>
                                        <th><small>Jabatan</small></th>
                                        <th><small>Aksi</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pejabats as $pejabat)
                                        <tr data-entry-id="{{ $pejabat->id }}">
                                            <td class="form-text">{{ $loop->iteration }}</td>
                                            <td class="form-text">{{ $pejabat->name }}</small></td>
                                            <td class="form-text">{{ $pejabat->nip }}</small></td>
                                            <td class="form-text">{{ $pejabat->pangkat }}</small></td>
                                            <td class="form-text">{{ $pejabat->jabatan }}</small></td>
                                            <td>
                                                <a href="{{ route('pejabat.edit', $pejabat) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger" data-id="{{ $pejabat->id }}" id="swall-delete" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
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
    <script>
        // const confirmation = document.getElementById('swall-delete')
        $('#example2').on('click', '#swall-delete', function () {
            let data = $(this).data()
            let pejabat = data.id

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
                        url: `{{ url('pejabat') }}/${pejabat}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res){
                            $(document).ajaxStop(function(){
                                setTimeout("window.location = 'pejabat'",1000);
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
