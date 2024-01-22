@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Log Activity</h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Log Activity</h5>
          </div>
          <br>
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered text-no-wrap border">
              <thead>
                <tr>
                  <th>Tanggal & Waktu</th>
                  <th>Nama User</th>
                  <th>Aktivitas</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logM as $l)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($l->created_at)->isoFormat('dddd, MMMM D, YYYY H:mm:ss') }}</td>
                  <td>{{ $l->name }}</td>
                  <td>{{ $l->activity }}</td>   
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
