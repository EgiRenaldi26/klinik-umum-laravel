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
            <form method="POST" action="{{ route('obat.update' , $obatE->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                <label for="input-1">Foto Obat</label>
                <input type="file" name="foto" class="form-control" id="input-1"  value="{{ $obatE->foto}}">
                </div>
                <div class="form-group">
                <label for="input-1">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $obatE->nama_obat}}">
                </div>
                <div class="form-group">
                <label for="input-1">Jenis Obat</label>
                <input type="text" name="jenis_obat" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $obatE->jenis_obat}}">
                </div>
                <div class="form-group">
                <label for="input-1">Dosis Obat</label>
                <input type="text" name="dosis" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $obatE->dosis}}">
                </div>
                <div class="form-group">
                <label for="input-1">Stok Obat</label>
                <input type="number" name="stok" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $obatE->stok}}">
                </div>
                <div class="form-group">
                <label for="input-1">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $obatE->keterangan}}">
                </div>
                <div class="form-group">
                <label for="input-4">Harga Obat</label>
                <input type="number" name="harga_obat"  class="form-control" id="input-4" placeholder="Enter Harga" value="{{ $obatE->harga_obat}}">
                </div>
                <button type="submit" class="btn btn-light px-5">Add</button>
            </div>
           </form>
          </div>
      </div>
    </div>
</div>
@endsection
