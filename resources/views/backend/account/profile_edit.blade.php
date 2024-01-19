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
      <h4 class="card-title">Update Profile</h4>
      <form class="forms-sample" method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1">Username</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ $editData->name }}">
        </div>

        <div class="form-group">
            <label for="exampleInputName1">User Email</label>
            <input type="email" class="form-control" id="exampleInputName1" name="email" value="{{ $editData->email }}">
        </div>

        <div class="form-group">
            <label for="exampleInputName1">User Mobile</label>
            <input type="text" class="form-control" id="exampleInputName1" name="mobile" value="{{ $editData->mobile }}">
        </div>

        <div class="form-group">
            <label for="exampleInputName1">User Address</label>
            <input type="text" class="form-control" id="exampleInputName1" name="address" value="{{ $editData->address }}">
        </div>

        <div class="form-group">
            <label for="exampleInputName1">User Position</label>
            <input type="text" class="form-control" id="exampleInputName1" name="position" value="{{ $editData->position }}">
        </div>

        <div class="form-group">
            <label for="exampleInputName1">User Gender</label>
            <select class="form-control" name="gender">
              <option value="" selected="" disabled="">Select Gender</option>
            <option value="Male" {{ $editData->gender == "Male" ? "selected" : "" }}> Male </option>
            <option value="Female" {{ $editData->gender == "Female" ? "selected" : "" }}> Female </option>
          </select>
          </div>
          
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleFormControlFile1">Image Upload</label>
                <input type="file" name="image" class="form-control-file" id="image">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleFormControlFile1">Old Image</label>
                <img id="showImage" src
                ="{{ (!empty($editData->image)) ? url('public/upload/user_image/'. $editData->image) : 
                url('public/upload/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #000000;" alt="OldImage">
                <!-- if the user has image, it will display the old image, if the user has no image it will display default image -->
              </div>
            </div>
          </div>



        <button type="submit" class="btn btn-primary mr-2">Submit</button>

      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#image').change(function(e){ // when the the upload field changes, we store the event in (e)
      var reader = new FileReader();
      // The FileReader object lets web applications asynchronously read the contents of files (or raw data buffers) stored on the user's computer, using File or Blob objects to specify the file or data to read.
      reader.onload = function(e){ 
      // A handler for the load event. This event is triggered each time the reading operation is successfully completed.
      // we load the change function(e) 
        $('#showImage').attr('src', e.target.result); // we target the e function(e) and put it in the src attribute
        // The event.target is an inbuilt property in jQuery which is used to find which DOM element will start the event.
      }
      reader.readAsDataURL(e.target.files['0']);
      // The readAsDataURL method is used to read the contents of the specified Blob or File
      // files['0'] this is the first and only element in the array, so the first one will be visible, because there can be multiple file selected. If it is ['1'] the second image will be shown
    });
  });
</script>

@endsection