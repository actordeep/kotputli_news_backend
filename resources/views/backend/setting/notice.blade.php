@extends('admin.admin_master')

@section('admin')

@if(Auth::user()->setting == 1)

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="{{ asset('backend/assets/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            <h4 class="mb-1 mb-sm-0">Welcome to Kotputli News</h4>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
            <span>
              <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit Frontend</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title mb-0">Notice Settings</h4>
        @if($notice->status == 1)
        <a href="{{ route('notice.deactive', $notice->id) }}">
          <button type="button" class="btn btn-danger btn-fw float-right">Deactivate</button>
        </a>
        @else
        <a href="{{ route('notice.active', $notice->id) }}">
          <button type="button" class="btn btn-primary btn-fw float-right">Active</button>
        </a>
        @endif
      </div>

@if($notice->status == 1)
<small class="text-success">Notice is Active</small>
@else
<small class="text-danger">Notice is Deactivated</small>
@endif


<form class="forms-sample" method="POST" action="{{ route('update.notice', $notice->id) }}">
@csrf
 

  <div class="form-group">
      <label for="exampleTextarea1" class="mt-4">Notice Text</label>
      <input type="text" class="form-control" name="notice" value="{{ $notice->notice }}">
  </div>

  <button type="submit" class="btn btn-primary mr-2">Submit</button>
</form>


      </div>
    </div>
 </div>

@else

<h2>No access</h2>

@endif

@endsection