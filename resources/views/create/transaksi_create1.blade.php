@extends('layout')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-15">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Tambah data transaksi</h6>
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="id_obat">Daftar Obat</label>
                                <select class="form-control" id="id_obat">
                                    @foreach ($obatT as $o)
                                        <option value="{{ $o->id_obat }}" data-nama="{{ $o->nama_obat }}" data-harga="{{ $o->harga_obat }}" data-id="{{ $o->id_obat }}">{{ $o->nama_obat }} - Rp.{{ number_format($o->harga_obat) }}</option>
                                    @endforeach
                                    <option value="1"></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah Produk</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="transaksiItem">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Jumlah</th>
                                        <th class="totalHarga">0</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="total_harga" value="0">
                            <button class="btn btn-primary">Simpan Transaksi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Let's assume you have a function formatRupiah to format the currency -->
<script>
    var totalHarga = 0;
    var quantity = 0;
    var listitem = [];

    function tambahItem() {
        updateTotalHarga(parseInt($('#id_obat').find(':selected').data('harga')));
        var item = listitem.filter((el) => el.id_obat === $('#id_obat').find(':selected').data('id'));

        if (item.length > 0) {
            item[0].quantity += 1;
        } else {
            var newItem = {
                id_obat: $('#id_obat').find(':selected').data('id'),
                nama_obat: $('#id_obat').find(':selected').data('nama'),
                harga_obat: $('#id_obat').find(':selected').data('harga'),
                quantity: 1 // Add quantity property
            };
            listitem.push(newItem);
        }
        updateQuantity(1);
        updateTable();
    }

    function updateTable() {
        var html = '';
        listitem.map((el, index) => {
            var harga = formatRupiah(el.harga_obat.toString());
            var quantity = formatRupiah(el.quantity.toString());

            html += `
            <tr>
                <td>${index + 1}</td>
                <td>${el.nama_obat}</td>
                <td>${harga}</td>
                <td>
                    <input type="hidden" name="id_obat[]" value="${el.id_obat}">    
                    <input type="hidden" name="nama_obat[]" value="${el.nama_obat}"> 
                    <button type="button" onclick="deleteItem(${index})" class="btn btn-link">
                        <i class="fa fa-trash text-danger"></i>    
                    </button>   
                </td>
            </tr>
            `;
        });
        $('.transaksiItem').html(html);
    }

    function deleteItem(index) {
        var item = listitem[index];
        if (item.quantity > 1) {
            listitem[index].quantity -= 1;
            updateTotalHarga(-(item.harga_obat));
            updateQuantity(-1);
        } else {
            listitem.splice(index, 1);
            updateTotalHarga(-(item.harga_obat * item.quantity));
            updateQuantity(-(item.quantity));
        }
        updateTable();
    }

    function updateTotalHarga(nom) {
        totalHarga += nom;
        $('[name=total_harga]').val(totalHarga);
        $('.totalHarga').html(formatRupiah(totalHarga.toString()));
    }

    function updateQuantity(nom) {
        quantity += nom;
        $('.quantity').html(formatRupiah(quantity.toString()));
    }

    // Assume you have a function formatRupiah to format the currency
    function formatRupiah(angka) {
        // Your currency formatting logic here
    }
</script>
