@extends('layouts.app')
@section('title', 'Data Transport')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Transportasi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <form action="{{ route('transport.store') }}" method="POST">
                        @csrf
                        <div class="card-header border-bottom">
                            <h4>Form Transportasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Transportasi</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer border-top">
                            <div class="form-group text-right mb-0">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
