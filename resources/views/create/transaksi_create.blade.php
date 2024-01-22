@extends('layout')

@section('content')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Tambah Transaksi</h5>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif

                @if ($error = Session::get('error'))
                    <div class="alert alert-danger">{{ $error }}</div>
                @endif

                <form method="POST" action="{{ route('transaksi.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="no_transaksi">No Transaksi</label>
                        <input type="text" name="no_transaksi" class="form-control" value="P{{ random_int(1000, 9999) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" class="form-control" placeholder="Tanggal Transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="pasien_id">Pasien</label>
                        <select name="pasien_id" class="form-control" required>
                            <option value="">- Pilih Pasien -</option>
                            @foreach ($pasienT as $pc)
                                <option value="{{ $pc->id }}">{{ $pc->nama_pasien }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" class="form-control" placeholder="Keluhan"></textarea>
                    </div>

                    <div id="obat-container">
                        <div class="form-group">
                            <label for="obat_id">Obat</label>
                            <select name="obat_id" class="form-control" required>
                                <option value="">- Pilih Obat -</option>
                                @foreach ($obatT as $oc)
                                    <option value="{{ $oc->id }}">{{ $oc->nama_obat }} - {{ $oc->harga_obat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <button type="button" class="btn btn-secondary" onclick="addObat()">Tambah Obat</button> --}}
                  
                    <div class="form-group">
                        <label for="rawat_id">Rawat</label>
                        <select name="rawat_id" class="form-control" required>
                            <option value="">- Pilih Paket -</option>
                            @foreach ($rawatT as $rc)
                                <option value="{{ $rc->id }}">{{ $rc->lama_rawat }} - {{ $rc->harga }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="uang_bayar">Uang Bayar</label>
                        <input type="number" name="uang_bayar" class="form-control" placeholder="Uang Bayar" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection