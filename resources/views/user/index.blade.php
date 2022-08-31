@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')

    <div class="title">
        Data Pegawai
    </div>
    <div class="card">
        <div class="card-header text-end">
            {{-- <a href="{{ route('user.create') }}" class="btn btn-danger btn-icon icon-right">Create <i
                    class="fas fa-chevron-right"></i></a> --}}
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-3 text-center mb-4">
                        @if ($user->image)
                            <img alt="image" src="{{ asset('storage/' . $user->image) }}" class="img mb-2" height="80" width="80" style="border-radius: 50%">
                        @else
                            <img alt="image" src="assets/images/avatar1.png" class="img mb-2" height="80" width="80" style="border-radius: 50%">
                        @endif
                        <div class="user-details">
                            <div class="user-name">{{ $user->name }}</div>
                            <div class="text-job text-muted"><small>{{ $user->pangkat }}</small></div>
                            <div class="footer py-2">
                                <a href="{{ route('profile', $user) }}" class="btn btn-primary" title="Ubah">Ubah</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
