@extends('admin.admin_master')

@section('admin')

@if(Auth::user()->category == 1)

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
        <h4 class="card-title">Add SubCategory</h4>


<form class="forms-sample" method="POST" action="{{ route('store.subcategory') }}">
@csrf
  <div class="form-group">
    <label for="exampleInputUsername1">SubCategory English</label>
    <input type="text" class="form-control" name="subcategory_en" placeholder="SubCategory English">
	    @error('subcategory_en')
	    <span class="text-danger">{{ $message }}</span>
	    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">SubCategory Hindi</label>
    <input type="text" class="form-control" name="subcategory_bg" placeholder="SubCategory Hindi">
	    @error('subcategory_bg')
	    <span class="text-danger">{{ $message }}</span>
	    @enderror
  </div>

  <div class="form-group">
      <label for="exampleFormControlSelect2">Select Category</label>
      <select class="form-control" name="category_id" id="exampleFormControlSelect2">

        <option disabled="" selected="">Select Category </option>
        @foreach($category as $row)
        <option value="{{ $row->id }}">{{ $row->category_en }} | {{ $row->category_bg }} </option>
        @endforeach
      </select>
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