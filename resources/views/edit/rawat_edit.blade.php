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
            <form method="POST" action="{{ route('rawat.update', $rawatE->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="input-1">Nama Obat</label>
                    <input type="text" name="lama_rawat" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $rawatE->lama_rawat}}">
                    </div>
                    <div class="form-group">
                    <label for="input-1">Harga</label>
                    <input type="text" name="harga" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{ $rawatE->harga}}">
                    </div>
                    <button type="submit" class="btn btn-light px-5">Add</button>
            </div>
           </form>
          </div>
      </div>
    </div>
</div>
@endsection
