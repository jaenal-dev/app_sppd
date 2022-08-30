@extends('layouts.app')

@section('title', 'Form NPPD')

@section('css')
    <link href="{{ asset('') }}vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

    <div class="title">
        Form NPPD
    </div>
    <div class="card">
        <form action="{{ route('nppd.edit', $nppd) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Nomor Surat</label>
                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor" value="{{ old('nomor', $nppd->nomor) }}" readonly>
                        @error('nomor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Pilih Pegawai</label>
                        <select class="form-select select2 @error('user') is-invalid @enderror" multiple name="user[]" data-placeholder="Pilih Pegawai" data-allow-clear="true" data-tags="true">
                            @foreach ($users as $user)
                                <option {{ $nppd->user()->find($user->id) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}-{{ $user->nip }}
                                </option>
                            @endforeach
                        </select>
                        @error('user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Lokasi Tujuan</label>
                        <select class="form-select select2 @error('location') is-invalid @enderror" multiple name="location[]" data-placeholder="Lokasi Tujuan" data-allow-clear="true" data-tags="true">
                            @foreach ($locations as $location)
                                <option {{ $nppd->location()->find($location->id) ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Tujuan</label>
                        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ old('tujuan', $nppd->tujuan) }}">
                        @error('tujuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Jenis Transport</label>
                        <select class="form-select select2 @error('transport') is-invalid @enderror" multiple name="transport[]" data-placeholder="Lokasi Tujuan" data-allow-clear="true" data-tags="true">
                            @foreach ($transports as $transport)
                                <option {{ $nppd->transport()->find($transport->id) ? 'selected' : '' }} value="{{ $transport->id }}">{{ $transport->name }}</option>
                            @endforeach
                        </select>
                        @error('transport')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label mb-2">Anggaran</label>
                        <select class="form-select @error('anggaran') is-invalid @enderror" name="anggaran_id">
                            @foreach ($anggarans as $anggaran)
                                <option {{ old('anggaran_id', $nppd->anggaran_id == $anggaran->id) ? 'selected' : '-' }} value="{{ $anggaran->id }}">{{ $anggaran->nominal }}</option>
                            @endforeach
                        </select>
                        @error('anggaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="start_date" class="form-label">Tanggal Berangkat s/d Pulang</label>
                        <div class="input-group mb-3 input-daterange datepicker date" data-date-format="dd-mm-yyyy">
                            <input class="form-control @error('tgl_pergi') is-invalid @enderror" required="" type="text" id="start_date" name="tgl_pergi" value="{{ old('tgl_pergi', $nppd->tgl_pergi) }}" readonly="">
                            @error('tgl_pergi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <span class="bg-primary text-light px-3 justify-content-center align-items-center d-flex">To</span>
                            <input class="form-control @error('tgl_pulang') is-invalid @enderror" required="" type="text" id="end_date" name="tgl_pulang" value="{{ old('tgl_pulang', $nppd->tgl_pulang) }}" readonly="">
                            @error('tgl_pulang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Ubah</button>
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
            format: 'dd-mm-yyyy'
        }).on('changeDate', function (e) {
            console.log(e.target.value);
        });
    </script>
@endsection
