@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Data Pasien</h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="card-title">Edit Pasien</div>
            <hr>
            <form method="POST" action="{{ route('pasien.update' , $pasienE->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                <label for="input-1">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $pasienE->nama_pasien}}">
                </div>

                <div class="form-group">
                    <label for="input-2">Jenis Kelamin</label>
                    <select class="form-control" id="input-2" name="jenis_kelamin" value="pasienE">
                        <option value="Laki-laki" @if($pasienE->jenis_kelamin == 'Laki-laki') selected @endif>Laki Laki</option>
                        <option value="Perempuan" @if($pasienE->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
             
                <div class="form-group">
                <label for="input-3">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="input-3" placeholder="" value="{{ $pasienE->tanggal_lahir}}">
                </div>
                <div class="form-group">
                <label for="input-4">No Telpon</label>
                <input type="number" name="no_telp"  class="form-control" id="input-4" placeholder="Enter No Telp" value="{{ $pasienE->no_telp}}">
                </div>
                <button type="submit" class="btn btn-light px-5">Update</button>
            </div>
           </form>
          </div>
      </div>
    </div>
</div>
@endsection
