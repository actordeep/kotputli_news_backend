@extends('admin.admin_master')

@section('admin')

@if(Auth::user()->website == 1)
	
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



<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
	  <div class="card-body">

	    <div class="d-flex justify-content-between align-items-center mb-3">
	    	<h4 class="card-title mb-0">Website Setting Links</h4>
	    	<a href="{{ route('add.website') }}">
	    		<button type="button" class="btn btn-primary btn-fw float-right">Add Website Link</button>
	    	</a>
	    </div>

	    <div class="table-responsive">
	      <table class="table table-bordered">
	        <thead>
	          <tr>
	            <th> # </th>
	            <th> Website Name </th>
	            <th> Website Link </th>
	            <th> Action </th>
	          </tr>
	        </thead>
	        <tbody>

	        	@php($i = 1)
	        	@foreach($website as $row)
	          <tr>
	            <td> {{ $i++ }} </td>
	            <td> {{ $row->website_name }} </td>
	            <td> {{ $row->website_link }} </td>
	            <td> 

		    <a href="{{ route('edit.website',$row->id) }}" class="btn btn-info">Edit</a>
		    <a href="{{ route('delete.website',$row->id) }}" onclick="return confirm('Are you sure you want to delete this website?')" class="btn btn-danger">Delete</a>

	            </td>
	          </tr>
	          	@endforeach

	        </tbody>
	      </table>
	      {{ $website->links('pagination-links') }}
	    </div>
	  </div>
	</div>
  </div>

@else

<h2>No access</h2>

@endif

@endsection