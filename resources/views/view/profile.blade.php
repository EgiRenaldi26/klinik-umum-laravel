@extends('layout')
@section('content')
<div class="row mt-3">
    <div class="col-lg-9">
       <div class="card profile-card-2">
        <div class="card-img-block">
            <img class="img-fluid" src="{{ asset('assets/images/klinik umum.png')}}" alt="Card image cap">
        </div>
        
        <div class="card-body pt-5">
            <img src="https://cdn-icons-png.flaticon.com/512/727/727399.png" alt="profile-image" class="profile">
            <h5 class="card-title">{{ Auth::user()->name}}</h5>
        </div>

        <div class="card-body border-top border-light">
                <div class="tab-pane" id="edit">
                    <form>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="{{ Auth::user()->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Role</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="{{ Auth::user()->role}}" readonly>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
       </div>
    </div>
</div>
@endsection