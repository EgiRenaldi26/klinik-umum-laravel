@extends('layout')

@section('content')
<div class="row mt-3">
    <h5 class="card-title">Data Transaksi</h5>
    <br><br>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambah Transaksi</div>
                <hr>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message}}</div>
                @endif
                @if ($error = Session::get('error'))
                    <div class="alert alert-danger">{{ $error }}</div>
                @endif
                <form method="POST" action="{{ route('transaksi.update', $transaksiE->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>No Transaksi</label>
                        <input type="text" name="no_transaksi" class="form-control" placeholder="Enter Your Name" value="{{ $transaksiE->no_transaksi }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" class="form-control" placeholder="" value="{{ $transaksiE->tanggal_transaksi }}">
                    </div>
                    <div class="form-group">
                        <label>Pasien</label>
                        <select name="pasien_id" class="form-control" required>
                            <option value="">- Pilih Pasien -</option>
                            @foreach ($pasienE as $pe)
                            <option value="{{ $pe->id }}" @if($pe->id == $pe->id) selected @endif>{{ $pe->nama_pasien }}</option>
                            @endforeach
                        </select>
                    </div>                                     
                    <div class="form-group">
                        <label>Keluhan</label>
                        <input type="text" name="keluhan"  class="form-control" placeholder="..." value="{{ $transaksiE->keluhan }}">
                    </div>
                    <div class="form-group">
                        <label>Obat</label>
                        <select name="obat_id" class="form-control" required>
                            <option value="">- Pilih Obat -</option>
                            @foreach ($obatE as $oe)
                            <option value="{{ $oe->id }}" @if($oe->id == $oe->id) selected @endif>{{ $oe->nama_obat }} - {{ $oe->harga_obat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rawat</label>
                        <select name="rawat_id" class="form-control" required>
                            <option value="">- Pilih Paket -</option>
                            @foreach ($rawatE as $re)
                            <option value="{{ $re->id }}" @if($re->id == $re->id) selected @endif>{{ $re->lama_rawat }} - {{ $re->harga }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uang Bayar</label>
                        <input type="number" name="uang_bayar" class="form-control" placeholder="..." value="{{ $transaksiE->uang_bayar }}">
                    </div>
                    <button type="submit" class="btn btn-light px-5">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
