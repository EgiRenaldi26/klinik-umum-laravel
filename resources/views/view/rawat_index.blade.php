@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Data Pasien</h5>
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
            <a href="{{ url('rawat/create')}}" class="btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a>
            
          </div>
          <br>
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered text-no-wrap border">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Lama Rawat</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($rawat) > 0)
                @foreach ($rawat as $r)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $r->lama_rawat }}</td>
                  <td>
                    {{ 'Rp ' . number_format($r->harga, 2, ',', '.') }}
                  </td>
                  <td>
                      <a href="{{ route('rawat.edit', ['id' => $r->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('rawat.destroy', ['id' => $r->id]) }}" class="btn btn-danger"
                        onclick="event.preventDefault();
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                          document.getElementById('delete-form-{{ $r->id }}').submit();
                        }">
                        <i class="fas fa-trash-alt"></i>
                     </a>
                    <form id="delete-form-{{ $r->id }}" action="{{ route('rawat.destroy', $r->id) }}"
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
