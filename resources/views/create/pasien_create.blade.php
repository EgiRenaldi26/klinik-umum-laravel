@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Data Pasien</h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="card-title">Tambah Pasien</div>
            <hr>
            <form method="POST" action="{{ route('pasien.store') }}">
                @csrf
                <div class="form-group">
                <label for="input-1">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" id="input-1" placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <label for="input-2">Jenis Kelamin</label>
                    <select class="form-control" id="input-2" name="jenis_kelamin">
                        <option value="">------- Pilih -------</option>
                        <option value="Laki-laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
             
                <div class="form-group">
                <label for="input-3">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="input-3" placeholder="">
                </div>
                <div class="form-group">
                <label for="input-4">No Telpon</label>
                <input type="number" name="no_telp"  class="form-control" id="input-4" placeholder="Enter No Telp">
                </div>
                <button type="submit" class="btn btn-light px-5">Add</button>
            </div>
           </form>
          </div>
      </div>
    </div>
</div>
@endsection
