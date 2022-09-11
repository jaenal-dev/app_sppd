@extends('layouts.app')

@section('title', 'Form Pejabat')

@section('content')

    <div class="title">
        Form Pejabat
    </div>
    <div class="card">
        <form action="{{ route('pejabat.update', $pejabat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label mb-2">Nama Jejabat</label>
                        <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name', $pejabat->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-2">NIP</label>
                        <input type="text" class="form-control mb-2 @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip', $pejabat->nip) }}">
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-2">Pangkat</label>
                        <input type="text" class="form-control mb-2 @error('pangkat') is-invalid @enderror" name="pangkat" value="{{ old('pangkat', $pejabat->pangkat) }}">
                        @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-2">Jabatan</label>
                        <input type="text" class="form-control mb-2 @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan', $pejabat->jabatan) }}">
                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
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
