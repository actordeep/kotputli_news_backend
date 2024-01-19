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
        <h4 class="card-title">MainWeb Settings</h4>



<form class="forms-sample" method="POST" action="{{ route('update.web', $websitesetting->id) }}" enctype="multipart/form-data">
@csrf
  <div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">Website Logo Upload</label>
      <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
    </div>

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Old Website Logo</label>
      <img src="{{ asset($websitesetting->logo) }}" style="width: 70px; height: 50px;">
      <input type="hidden" name="oldlogo" value="{{ $websitesetting->logo }}">
    </div>

  </div> <!-- End Row  --> 

  <div class="form-group">
    <label for="exampleTextarea1">Address</label>
    <textarea class="form-control" name="address" id="summernote">{{ $websitesetting->address }}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputUsername1">Phone English</label>
    <input type="text" class="form-control" name="phone_en" value="{{ $websitesetting->phone_en }}">
  </div>

  <div class="form-group">
    <label for="exampleInputUsername1">Phone Hindi</label>
    <input type="text" class="form-control" name="phone_bg" value="{{ $websitesetting->phone_bg }}">
  </div>

  <div class="form-group">
    <label for="exampleInputUsername1">Email</label>
    <input type="text" class="form-control" name="email" value="{{ $websitesetting->email }}">
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