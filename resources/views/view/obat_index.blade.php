@extends('layout')
@section('content')
<div class="row mt-3">
  <h5 class="card-title">Data Obat</h5>
  <br><br>
  <div class="col-lg-12">
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
          <a href="{{ url('obat/create')}}" class="btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <br>
        <div class="table-responsive">
            <table id="myTable" class="table table-bordered text-no-wrap border">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Foto Obat</th>
                  <th scope="col">Nama Obat</th>
                  <th scope="col">Jenis Obat</th>
                  <th scope="col">Dosis</th>
                  <th scope="col">Stok</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Harga Obat</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($obat) > 0)
                @foreach ($obat as $o)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  {{-- <td><img src="{{ asset('storage/' . $o->foto) }}" alt="obat"></td> --}}
                  <td>
                    @if ($o->foto)
                    <a href="{{ asset('assets/images/obat/' . $o->foto) }}" target="_blank">
                      <img src="{{ asset('assets/images/obat/' . $o->foto) }}" alt="obat" width="50">
                    </a>
                    @else
                    No image
                    @endif
                  </td>
                  <td>{{ $o->nama_obat }}</td>
                  <td>{{ $o->jenis_obat }}</td>
                  <td>{{ $o->dosis }}</td>
                  <td>{{ $o->stok }}</td>
                  <td>{{ $o->keterangan }}</td>
                  <td>
                    {{ 'Rp ' . number_format($o->harga_obat, 2, ',', '.') }}
                  </td>
                  <td>
                      <a href="{{ route('obat.edit', ['id' => $o->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('obat.destroy', ['id' => $o->id]) }}" class="btn btn-danger"
                        onclick="event.preventDefault();
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                          document.getElementById('delete-form-{{ $o->id }}').submit();
                        }">
                        <i class="fas fa-trash-alt"></i>
                     </a>
                    <form id="delete-form-{{ $o->id }}" action="{{ route('obat.destroy', $o->id) }}"
                        method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                
                      {{-- <button class="btn btn-success"><i class="fas fa-print"></i></button> --}}
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
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
