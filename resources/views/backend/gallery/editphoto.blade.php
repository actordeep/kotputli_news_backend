@extends('admin.admin_master')

@section('admin')

@if(Auth::user()->gallery == 1)

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
      <h4 class="card-title">Edit Photo</h4>
      <form class="forms-sample" method="POST" action="{{ route('update.photo', $photo->id) }}" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
          <div class="form-group">
            <label for="exampleInputName1">Photo Title</label>
            <input type="text" class="form-control" id="exampleInputName1" name="title" value="{{ $photo->title }}">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputName1">Gallery Image Upload</label>
            <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputName1">Old Image</label>
            <img src="{{ URL::to($photo->photo) }}" style="width:70px; height: 50px;" alt="Old Image">
            <input type="hidden" name="oldimage" value="{{ $photo->photo }}">
          </div>
        </div> <!-- End row -->


          <div class="form-group">
            <label for="exampleInputName1">Photo Type</label>
            <select class="form-control" name="type">
              
            <option value="1" 

            <?php if ($photo->type == 1) {
                echo "selected";
              } ?>

            > Big Photo </option>

            <option value="0"

            <?php if ($photo->type == 0) {
                echo "selected";
            } ?>

            > Small Photo </option>
          </select>
          </div>

        <button type="submit" class="btn btn-primary mr-2">Update</button>

      </form>
    </div>
  </div>
</div>

@else

<h2>No access</h2>

@endif

@endsection