@extends('layouts.app')

@section('title', 'Form NPPD')

@section('content')

    <div class="title">
        Form Lokasi
    </div>
    <div class="card">
        <form action="{{ route('location.update', $location) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label mb-2">Nama Lokasi</label>
                        <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name', $location->name) }}">
                        @error('name')
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

@section('js')

@endsection
