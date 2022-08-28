@extends('layouts.auth_page')
@section('title', 'Register')
@section('auth')
    <div class="card-body p-4">
        <h1 class="fs-4 text-center fw-bold mb-4">Register</h1>
        <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label class="mb-2 form-label text-muted" for="name">Nama</label>
                <div class="input-group input-group-join mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                    <span class="input-group-text rounded-end">&nbsp<i class="fa fa-user"></i>&nbsp</span>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-2 form-label text-muted" for="nip">NIP</label>
                <div class="input-group input-group-join mb-3">
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autofocus>
                    <span class="input-group-text rounded-end">&nbsp<i class="fa fa-id-card"></i>&nbsp</span>
                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-2 form-label text-muted" for="email">E-Mail Address</label>
                <div class="input-group input-group-join mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label class="form-label">Jenis Kelamin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L" {{ old('jenis_kelamin')=='L' ? 'checked': '' }} >
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P"
                    {{ old('jenis_kelamin')=='P' ? 'checked': '' }} >
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="mb-2 w-100">
                    <label class="form-label text-muted" for="password">Password</label>
                </div>
                <div class="input-group input-group-join mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-2 w-100">
                    <label class="form-label text-muted" for="password">Ulangi Password</label>
                </div>
                <div class="input-group input-group-join mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                    <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary ms-auto">
                    Register
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer py-3 border-0">
        <div class="text-center">
            Already have an account? <a href="{{ route('login') }}" class="text-dark">Login</a>
        </div>
    </div>
@endsection
