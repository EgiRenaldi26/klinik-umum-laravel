@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Data Obat</h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="card-title">Tambah Obat</div>
            <hr>
            <form method="POST" action="{{ route('user.update' , $userE->id ) }}">
                @csrf
                @method('put')
                <div class="form-group">
                <label for="input-1">Username</label>
                <input type="text" name="username" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $userE->username}}" readonly>
                </div>
                <div class="form-group">
                <label for="input-1">Name</label>
                <input type="text" name="name" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $userE->name}}">
                </div>
                
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="" class="form-control">
                        <option>- Pilih Role -</option>
                        @if($userE->role == 'admin')
                        <option value="admin" selected>Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="kasir">Kasir</option>
                        <option value="farmasi">Farmasi</option>
                        @endif

                        @if($userE->role == 'dokter')
                        <option value="admin">Admin</option>
                        <option value="dokter"selected>Dokter</option>
                        <option value="kasir">Kasir</option>
                        <option value="farmasi">Farmasi</option>
                        @endif

                        @if($userE->role == 'kasir')
                        <option value="admin" >Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="kasir" selected>Kasir</option>
                        <option value="farmasi">Farmasi</option>
                        @endif

                        @if($userE->role == 'farmasi')
                        <option value="admin" >Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="kasir">Kasir</option>
                        <option value="farmasi" selected>Farmasi</option>
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-light px-5">Add</button>
            </div>
           </form>
          </div>
      </div>
    </div>
</div>
@endsection
