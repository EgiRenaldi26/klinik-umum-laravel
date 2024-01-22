@extends('layout')
@section('content')

<div class="row mt-3">
    <h5 class="card-title">Data Transaksi</h5>
    <br><br>
    <div class="col-lg-12">
      @if (Auth::user()->role == 'admin')
         
          <a href="{{ url('/pdf')}}" style="float: left;" class="m-1 btn btn-warning" type="submit"><i class="fas fa-print"></i> Generate PDF</a>
          <br><br><br>
      @endif
      <div class="card">
        <div class="card-body">
          @if ($message = Session::get('success'))
          <script>
              $(document).ready(function () {
                  var message = @json(Session::get('success')); 
                  if (message) {
                      // Use sweetAlert instead of Swal.fire
                      swal({
                          icon: 'success',
                          title: 'Success Message',
                          text: message,
                          confirmButtonText: 'OK'
                      });
                  }
              });
          </script>
          @endif
          <div class="d-flex justify-content-between align-items-center">
            {{-- <form class="search-bar">
              <input type="text" class="form-control smaller-input" placeholder="Enter keywords">
              <a href="javascript:void();"><i class="icon-magnifier"></i></a>
            </form> --}}
            <a href="{{ url('transaksi/create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered text-no-wrap border">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Transaksi</th>
                  <th scope="col">Tanggal Transaksi</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Keluhan</th>
                  <th scope="col">Obat</th>
                  <th scope="col">Rawat</th>
                  <th scope="col">Total Biaya</th>
                  <th scope="col">Uang Bayar</th>
                  <th scope="col">Uang Kembali</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($transaksi) > 0)
                @foreach ($transaksi as $t)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>
                    <center>
                      {!! QrCode::size(50)->generate( $t->no_transaksi); !!}
                    </center>
                  </td>
                  <td>{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->isoFormat('dddd, MMMM D, YYYY H:mm:ss') }}</td>
                  <td>
                    @if ($t->pasien)
                    {{ $t->pasien->nama_pasien }}
                    @endif
                  </td>
                  <td>{{ $t->keluhan }}</td>
                  <td>
                    @if ($t->obat)
                    {{ $t->obat->nama_obat }} - {{ 'Rp ' . number_format($t->obat->harga_obat, 2, ',', '.') }}
                    @endif
                  </td>
                  <td>
                    @if ($t->rawat)
                    {{ $t->rawat->lama_rawat }} - {{ 'Rp ' . number_format($t->rawat->harga, 2, ',', '.') }}
                    @endif
                  </td>
                  <td>{{ 'Rp ' . number_format($t->total_biaya, 2, ',', '.') }}</td>
                  <td>{{ 'Rp ' . number_format($t->uang_bayar, 2, ',', '.') }}</td>
                  <td>{{ 'Rp ' . number_format($t->uang_kembali, 2, ',', '.') }}</td>
                  <td>
                      <a href="{{ route('transaksi.edit', ['id' => $t->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('transaksi.destroy', ['id' => $t->id]) }}" class="btn btn-danger"
                        onclick="event.preventDefault();
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                          document.getElementById('delete-form-{{ $t->id }}').submit();
                        }">
                        <i class="fas fa-trash-alt"></i>
                     </a>
                    <form id="delete-form-{{ $t->id }}" action="{{ route('transaksi.destroy', $t->id) }}"
                        method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                    <a href="{{ route('transaksi.pdf' , ['id' => $t->id] )}}" class="btn btn-success"><i class="fas fa-print"></i></a>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="5">Data Tidak Ditemukan</td>
                </tr>
                @endif
              </tbody>
            </table>
         <!-- Pagination Links -->
          <div class="d-flex justify-content-left">
            {{ $transaksi->links('pagination::bootstrap-5') }}
          </div>

          </div>
        </div>
      </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            fixedHeader: true, // Fix the header
            scrollX: true, // Enable horizontal scroll
            pagingType: 'full_numbers' // Display full pagination
        });
    });
</script>
@endpush

@endsection
