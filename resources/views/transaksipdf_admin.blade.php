<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
    
        th, td {
            padding: 15px;
            text-align: left;
        }
    
        table.align-right {
            float: right;
        }
    
        table.align-left {
            float: left;
        }

        /* Override styles for specific elements */
        .no-transaction, .tanggal-transaction, .nama-pasien {
            font-size: small;
        }

        /* Add any additional styles you need */
    </style>
</head>
<body>
    <center>
        <h4>KWITANSI PEMBAYARAN <br><span>KLINIK ER MEDICAL</span></h4>
        <p style="font-size: x-small;">Jl.Raya Cipunagara, Kec Cipunagara, Kab Subang, Kode Pos 41257</p>
    </center>
    <hr>
    
    @foreach ($transaksi as $transaction)
    <table align="center" border="0" cellpadding="1" style="width: 700px;">
        <tbody>
            <tr>     
                <td colspan="3"><div align="center"></div></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="0" style="width: 400px;">
                        <tbody>
                            <tr>
                                <td width="93" class="no-transaction">No Transaksi</td>
                                <td width="8"><span style="font-size: small;">:</span></td>
                                <td width="200"><span style="font-size: small;">{{ $transaction->no_transaksi }}</span></td>
                            </tr>
                            <tr>
                                <td class="tanggal-transaction">Tanggal Transaksi</td>
                                <td><span style="font-size: small;">:</span></td>
                                <td><span style="font-size: small;">{{ $transaction->tanggal_transaksi }}</span></td>
                            </tr>
                         
                            <tr>
                                <td class="nama-pasien">Nama Pasien</td>
                                <td><span style="font-size: small;">:</span></td>
                                <td>
                                    <span style="font-size: small;">
                                        @if ($transaction->pasien)
                                        {{ $transaction->pasien->nama_pasien }}
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table border="1" cellspacing="0" cellpadding="15">
        <tr>
            <th>No</th>
            <th>Tindakan</th>
            <th>Detail</th>
            <th>Biaya Pembayaran</th>
        </tr>
        <tr>
            <td><strong>1</strong></td>
            <td><strong>Konsultasi</strong></td>
            <td>{{ $transaction->keluhan }}</td>
            <td>-</td>
        </tr>
        <tr>
            <td><strong>2</strong></td>
            <td><strong>Obat</strong></td>
            <td>
                @if ($transaction->obat)
                {{ $transaction->obat->nama_obat }}
                @endif
            </td>
            <td>
                @if ($transaction->obat)
                {{ 'Rp ' . number_format($transaction->obat->harga_obat, 2, ',', '.') }}
                @endif
            </td>
        </tr>
        <tr>
            <td><strong>3</strong></td>
            <td><strong>Rawat</strong></td>
            <td>
                @if ($transaction->rawat)
                {{ $transaction->rawat->lama_rawat }}
                @endif
            </td>
            <td>
                @if ($transaction->rawat)
                {{ 'Rp ' . number_format($transaction->rawat->harga, 2, ',', '.') }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="3"><strong>Total Biaya</strong></td>
            <td>
                {{ 'Rp ' . number_format($transaction->total_biaya, 2, ',', '.') }}
            </td>
        </tr>
    </table>
    <br><br><br>
    @endforeach

    <table align="right">   
        <tr>
            <td style="font-size: x-small;">Yang Bertanda tangan dibawah ini :</td>
        </tr>
        <tr>
            <td style="font-size: x-small;"><br><br><br><br><br></td>
        </tr>
        <tr>
            <td style="font-size: x-small;">.........................................................</td>
        </tr>
        <tr>
            <td style="font-size: x-small;">kasir , {{ Auth::user()->name }}</td>
        </tr>
    </table>
</body>
</html>
