@extends('layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="{{ route('user.index')}}" class="btn-sm btn-success">Kembali</a>
            <br><br>
            <form method="POST" action="{{ route('user.change', $userCF->id)}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $userCF->username}}" readonly>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="password_old">Password Lama</label>
                    <input type="text" class="form-control" name="password_old" value="{{ old('password_old') }}" required>
                    @error('password_old')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="password_new">Password Baru</label>
                    <input type="password" class="form-control" name="password_new" value="{{ old('password_new') }}" required>
                    @error('password_new')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirm">Ulangi Password Baru</label>
                    <input type="password" class="form-control" name="password_confirm" value="{{ old('password_confirm') }}" required>
                    @error('password_confirm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
