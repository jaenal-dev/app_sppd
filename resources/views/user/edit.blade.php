@extends('layouts.app')
@section('title', 'Edit Data Pegawai')
@section('content')

    <div class="title">
        Ubah Data Pegawai
    </div>
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Nama</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="nip">NIP</label>
                        <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror"
                            name="nip" value="{{ old('nip', $user->nip) }}">
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pangkat">Pangkat</label>
                        <input id="pangkat" type="pangkat" class="form-control @error('pangkat') is-invalid @enderror"
                            name="pangkat" value="{{ old('pangkat', $user->pangkat) }}">
                        @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="golongan">Golongan</label>
                        <input id="golongan" type="golongan" class="form-control @error('golongan') is-invalid @enderror"
                            name="golongan" value="{{ old('golongan', $user->golongan) }}">
                        @error('golongan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jabatan">Jabatan</label>
                        <input id="jabatan" type="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                            name="jabatan" value="{{ old('jabatan', $user->jabatan) }}">
                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
