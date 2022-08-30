@extends('layouts.app')

@section('title', 'Data SPPD')

@section('css')
    <link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div class="title">
        Data Anggaran
        <div class="card-header text-end">
            <a href="{{ route('anggaran.create') }}" class="btn btn-primary mb-2" role="button"><i class="fas fa-plus"></i>Tambah</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-responsive">
                            <table id="table-anggaran" class="table display text-center table-sm">
                                <thead>
                                    <tr>
                                        <th><small>No</small></th>
                                        <th><small>Nominal</small></th>
                                        <th><small>Aksi</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggarans as $anggaran)
                                        <tr data-entry-id="{{ $anggaran->id }}">
                                            <td class="form-text">{{ $loop->iteration }}</td>
                                            <td class="form-text">Rp {{ $anggaran->nominal }}</small></td>
                                            <td>
                                                <a href="{{ route('anggaran.edit', $anggaran) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <button class="btn btn-danger action" id="swall-delete" data-id="{{ $anggaran->id }}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
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
    $('#table-anggaran').on('click', '#swall-delete', function () {
        let data = $(this).data()
        let anggaran = data.id

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
                    url: `{{ url('anggaran') }}/${anggaran}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                        $(document).ajaxStop(function(){
                            setTimeout("window.location = 'anggaran'",1000);
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
