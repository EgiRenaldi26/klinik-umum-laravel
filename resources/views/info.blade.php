@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Informasi</h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="card-title">Informasi</h6>
          
          </div>
          <br>
          <center>
            <img src="{{ asset('assets/images/klinik_icon.png')}}" width="10%">
          </center>
          <br>
          <div>
            <p align="justify" style="font-size: small">Aplikasi klinik umum yang mencakup pencatatan kasir, admin, dokter, dan farmasi adalah solusi perangkat lunak yang dirancang untuk membantu manajemen dan operasional klinik umum. Berikut adalah pengertian umum tentang komponen-komponen tersebut:</p>
          </div>
          <br><br>
          <!-- Bagian Admin -->
        <div class="role" id="admin">
            <h6>Admin</h6>
            <ul>
                <li>Manajemen Keseluruhan: Admin memiliki akses penuh ke seluruh sistem. Mereka dapat menambahkan dan menghapus pengguna, mengatur izin akses, serta mengelola data klinik secara keseluruhan.</li>
                <li>Pelaporan dan Analisis: Admin dapat mengakses laporan dan analisis performa klinik. Ini melibatkan data pasien , data obat dan keuangan</li>
                <li>Daftar Rawat: Admin memiliki fitur tambahan yaitu menu rawat , fungsinya yaitu untuk pasien ingin dirawat .</li>
                <li>Pelaporan Pertanggal: Admin memiliki fitur print pdf data transaksi pertanggal sekian sampai data sekian</li>
            </ul>
        </div>

        <!-- Bagian Dokter -->
        <div class="role" id="dokter">
            <h6>Dokter</h6>
            <ul>
                <li>Pendaftaran Pasien: Dokter dapat membuat catatan pasien, dan melihat daftar obat</li>
                <li>Pelaporan: Dokter dapat membuat laporan mengenai Surat Izin Sakit (Opsional) , Jika surat izin sakit diperlukan</li>
            </ul>
        </div>

        <!-- Bagian Kasir -->
        <div class="role" id="kasir">
            <h6>Kasir</h6>
            <ul>
                <li>Management Keuangan: Kasir bertanggung jawab mengenai management keuangan pada aplikasi klinik umum</li>
                <li>Pelaporan: Kasir dapat mencetak Kwitansi tentang keuangan yang dikeluarkan</li>
            </ul>
        </div>

        <!-- Bagian Farmasi -->
        <div class="role" id="farmasi">
            <h6>Farmasi</h6>
            <ul>
                <li>Pendataan Obat : Farmasi Bertanggung jawab mengenai perobatan, mereka dapat menambah , mengedit , dan menghapus , daftar obat yang tersedia di klinik</li>
            </ul>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection
