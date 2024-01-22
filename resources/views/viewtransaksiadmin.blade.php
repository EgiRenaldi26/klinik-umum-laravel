@extends('layout')
@section('content')
<div class="row mt-3">
    <h5 class="card-title">Laporan </h5>
    <br><br>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="card-title">Generate Transaksi</h6>
          </div>
          <br><br>
          <div>
            <form action="{{ route('generate.pdf') }}" method="get">
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input class="form-control " type="date" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input class="form-control " type="date" id="end_date" name="end_date" required>
                </div>

                <button class="m-1 btn btn-warning" type="submit">Generate PDF</button>
            </form>
          </div>
          <br>
        </div>
    </div>
</div>
@endsection
