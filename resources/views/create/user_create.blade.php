@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Data Users</h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="card-title">Tambah Data Users</div>
            <hr>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-group">
                <label for="input-1">Name</label>
                <input type="text" name="name" class="form-control" id="input-1" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                <label for="input-1">Username</label>
                <input type="text" name="username" class="form-control" id="input-1" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                <label for="input-1">Password</label>
                <input type="password" name="password" class="form-control" id="input-1" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                <label for="input-1">Password Confirm</label>
                <input type="password" name="password_confirm" class="form-control" id="input-1" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control"  required>
                        <option value="">- Pilih Role -</option>
                        <option value="admin">Admin</option>
                        <option value="dokter">Dokter</option>
                        <option value="kasir">Kasir</option>
                        <option value="farmasi">Farmasi</option>
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
