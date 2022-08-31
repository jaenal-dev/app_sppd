@extends('layouts.app')

@section('title', 'Ubah Password')

@section('content')

    <div class="text">
        <h1>Ubah Password</h1>
    </div>

    <div class="row same-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Hi, <b>{{ Auth::user()->name }}</b></h5>
                    <small>
                        <p class="mb-0">Change your password on this page.</p>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="row same-height">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('password.edit') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex">
                        <div class="card-body">
                            <div class="row same-height">

                                <div class="col-md-6 mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="form-label text-muted" for="current_password">Password</label>
                                    </div>
                                    <div class="input-group input-group-join mb-3">
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                                        <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                        @error('current_password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="form-label text-muted" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-join mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="form-label text-muted" for="password_confirmation">Ulangi Password</label>
                                    </div>
                                    <div class="input-group input-group-join mb-3">
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                        <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endsection
