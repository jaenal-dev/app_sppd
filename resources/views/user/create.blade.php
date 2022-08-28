@extends('layouts.app')
@section('title', 'Tambah Data Pegawai')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Data Pegawai</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <form action="{{ route('user.store') }}" method="POST">
                        <div class="card-header">
                            <h4>Form Data Pegawai</h4>
                            <div class="card-header-action">
                                @csrf
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nip">NIP</label>
                                        <input id="nip" type="text"
                                            class="form-control @error('nip') is-invalid @enderror" name="nip"
                                            value="{{ old('nip') }}">
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="pangkat">Pangkat</label>
                                        <input id="pangkat" type="pangkat"
                                            class="form-control @error('pangkat') is-invalid @enderror" name="pangkat"
                                            value="{{ old('pangkat') }}">
                                        @error('pangkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="esselon">Esselon</label>
                                        <input id="esselon" type="esselon"
                                            class="form-control @error('esselon') is-invalid @enderror" name="esselon"
                                            value="{{ old('esselon') }}">
                                        @error('esselon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="row">
                                <div class="form-group col-6">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
