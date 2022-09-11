@extends('layouts.app')

@section('title', 'Form Nota Dinas')

@section('css')
    <link href="{{ asset('') }}vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

    <div class="title">
        Form Nota Dinas
    </div>
    <div class="card">
        <form action="{{ route('nppd.create') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">No. Surat Tugas</label>
                        <select class="form-select @error('spt_id') is-invalid @enderror" name="spt_id" data-placeholder="Nomor Surat Tugas">
                            <option value="">-</option>
                            @foreach ($spts as $spt)
                                <option value="{{ $spt->id }}">{{ $spt->nomor }}</option>
                            @endforeach
                        </select>
                        @error('spt_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Kepada</label>
                        <input type="text" class="form-control @error('kepada') is-invalid @enderror" name="kepada" value="{{ old('kepada') }}">
                        @error('kepada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Dari</label>
                        <input type="text" class="form-control @error('dari') is-invalid @enderror" name="dari" value="{{ old('dari') }}">
                        @error('dari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Anggaran</label>
                        <select class="form-select @error('anggaran_id') is-invalid @enderror" name="anggaran_id" data-placeholder="Anggaran">
                            <option value="">-</option>
                            @foreach ($anggarans as $anggaran)
                                <option value="{{ $anggaran->id }}">{{ $anggaran->nominal }}</option>
                            @endforeach
                        </select>
                        @error('anggaran_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Prihal</label>
                        <input type="text" class="form-control @error('prihal') is-invalid @enderror" name="prihal" value="{{ old('prihal') }}">
                        @error('prihal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/select2/dist/js/select2.min.js"></script>
    <script src="../vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: 'Select an option'
            });
        });
    </script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        }).on('changeDate', function (e) {
            console.log(e.target.value);
        });
    </script>
@endsection
