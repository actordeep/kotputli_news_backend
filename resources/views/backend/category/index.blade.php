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



<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
	  <div class="card-body">

	    <div class="d-flex justify-content-between align-items-center mb-3">
	    	<h4 class="card-title mb-0">Category Page</h4>
	    	<a href="{{ route('add.category') }}">
	    		<button type="button" class="btn btn-primary btn-fw float-right">Add Category</button>
	    	</a>
	    </div>

	    <div class="table-responsive">
	      <table class="table table-bordered">
	        <thead>
	          <tr>
	            <th> # </th>
	            <th> Category English </th>
	            <th> Category Hindi </th>
	            <th> Action </th>
	          </tr>
	        </thead>
	        <tbody>

	        	@php($i = 1)
	        	@foreach($category as $key => $row)
	          <tr>
	            <td> {{ $category->firstItem() + $key }} </td>
	            <td> {{ $row->category_en }} </td>
	            <td> {{ $row->category_bg }} </td>
	            <td> 

		    <a href="{{ route('edit.category',$row->id) }}" class="btn btn-info">Edit</a>
		    <a href="{{ route('delete.category',$row->id) }}" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">Delete</a>

	            </td>
	          </tr>
	          	@endforeach

	        </tbody>
	      </table>
	      {{ $category->links('pagination-links') }}
	    </div>
	  </div>
	</div>
  </div>

@else

<h2>No access</h2>

@endif

@endsection