@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title mb-0">Profile Page</h4>
        <a href="{{ route('profile.edit') }}">
          <button type="button" class="btn btn-success btn-fw float-right">Edit Profile</button>
        </a>
      </div>
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{ (!empty($editData->image)) ? url('public/upload/user_image/'. $editData->image) : 
                url('public/upload/no_image.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Username : {{ Auth::user()->name }}</h5>
            <p class="card-text">User Email : {{ Auth::user()->email }}</p>
            <p class="card-text">User Mobile : {{ $editData->mobile }}</p>
            <p class="card-text">User Address : {{ $editData->address }}</p>
            <p class="card-text">User Sex : {{ Auth::user()->gender }}</p>
            <p class="card-text">User Position : {{ Auth::user()->position }}</p>
          </div>
    </div>
  </div>
</div>

@endsection