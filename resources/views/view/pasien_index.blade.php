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
              var message = @json(Session::get('success')); 
              if (message) {
                  // Use sweetAlert instead of Swal.fire
                  Swal.fire({
                      icon: 'success',
                      title: 'Success Message',
                      text: message,
                      confirmButtonText: 'OK',
                      showClass: {
                          popup: 'animate__animated animate__fadeInDown'
                      }
                  });
              }
          </script>
      @endif
      

          <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('pasien/create')}}" class="btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered text-no-wrap border">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Jenis kelamin</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">No Telp</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($pasien) > 0)
                @foreach ($pasien as $p)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $p->nama_pasien }}</td>
                  <td>{{ $p->jenis_kelamin }}</td>
                  <td>{{ $p->tanggal_lahir }}</td>
                  <td>{{ $p->no_telp }}</td>
                  <td>
                      <a href="{{ route('pasien.edit', ['id' => $p->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('pasien.destroy', ['id' => $p->id]) }}" class="btn btn-danger"
                        onclick="event.preventDefault();
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                          document.getElementById('delete-form-{{ $p->id }}').submit();
                        }">
                        <i class="fas fa-trash-alt"></i>
                     </a>
                    <form id="delete-form-{{ $p->id }}" action="{{ route('pasien.destroy', $p->id) }}"
                        method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                    <a href="{{ route('pasien.pdf' , ['id' => $p->id] )}}" class="btn btn-success"><i class="fas fa-print"></i></a>
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
