@extends('layouts.app')
@section('title', 'Tambah Anggaran')
@section('content')
    <div class="title">
        Form Anggaran
    </div>
    <div class="content-wrapper">
        <div class="card">
            <form action="{{ route('anggaran.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <label class="form-label" for="nominal">Nominal</label>
                    <input type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                        value="{{ old('nominal') }}" autofocus>
                    @error('nominal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
