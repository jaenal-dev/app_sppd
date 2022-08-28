@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')

    <div class="title">
        Data Pegawai
    </div>
    <div class="card">
        <div class="card-header text-end">
            <a href="{{ route('user.create') }}" class="btn btn-danger btn-icon icon-right">Create <i
                    class="fas fa-chevron-right"></i></a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-4 text-center mb-4">
                        <img alt="image" src="assets/images/avatar1.png" class="img" height="80" width="80">
                        <div class="user-details">
                            <div class="user-name">{{ $user->name }}</div>
                            <div class="text-job text-muted">{{ $user->esselon }}</div>
                            <div class="card-footer">
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary" title="Ubah">Ubah</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
