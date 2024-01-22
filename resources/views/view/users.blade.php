@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Users</h5>
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
            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ url('user/create')}}" class="btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a >
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <table id="myTable"class="table table-bordered text-no-wrap border">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              
                @foreach ($user as $u)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $u->name }}</td>
                  <td>{{ $u->username }}</td>
                  <td>{{ $u->role }}</td>
                  <td>
                      <a href="{{ route('user.edit', ['id' => $u->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('user.destroy', ['id' => $u->id]) }}" class="btn btn-danger"
                        onclick="event.preventDefault();
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                          document.getElementById('delete-form-{{ $u->id }}').submit();
                        }">
                        <i class="fas fa-trash-alt"></i>
                     </a>
                    <form id="delete-form-{{ $u->id }}" action="{{ route('user.destroy', $u->id) }}"
                        method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                    <a href="{{ route('user.changepassword', $u->id) }}" class="btn btn-success"><i class="fas fa-lock"></i></a>
                      {{-- <button class="btn btn-success"><i class="fas fa-print"></i></button> --}}
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
