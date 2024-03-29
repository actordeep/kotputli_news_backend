@extends('admin.admin_master')

@section('admin')

@if(Auth::user()->post == 1)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@php
  $subcategories = DB::table('subcategories')->where('category_id', $post->category_id)->get();

  $subdistricts = DB::table('subdistricts')->where('district_id', $post->district_id)->get();
@endphp

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
      <h4 class="card-title">Edit Post</h4>
      <form class="forms-sample" method="POST" action="{{ route('update.post', $post->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputName1">Title English</label>
            <input type="text" class="form-control" id="exampleInputName1" name="title_en" value="{{ $post->title_en }}">
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputName1">Title Hindi</label>
            <input type="text" class="form-control" id="exampleInputName1" name="title_bg" value="{{ $post->title_bg }}">
          </div>
        </div> <!-- End row -->



        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputName1">Category</label>
            <select class="form-control" id="exampleSelectGender" name="category_id">
            <option disabled="" selected="">Select Category</option>
            @foreach($category as $row)
            <option value="{{ $row->id }}"

              <?php if ( $row->id  == $post->category_id) {
                echo "selected";
              } ?>
              >{{ $row->category_en }} | {{ $row->category_bg }}</option>
            @endforeach
          </select>
          </div>

          <div class="form-group col-md-6">
            <label for="subcategory_id">SubCategory</label>
            <select class="form-control" name="subcategory_id" id="subcategory_id">
            <option disabled="" selected="">Select SubCategory</option>

            @foreach($subcategories as $row)
            <option value="{{ $row->id }}"

              <?php if ( $row->id  == $post->subcategory_id) {
                echo "selected";
              } ?>
              >{{ $row->subcategory_en }} </option>
            @endforeach

          </select>
          </div>
        </div> <!-- End row -->


        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputName1">District</label>
            <select class="form-control" id="exampleSelectGender" name="district_id">
            <option disabled="" selected="">Select District</option>
            @foreach($district as $row)
            <option value="{{ $row->id }}"
              <?php if ( $row->id  == $post->district_id) {
                echo "selected";
              }  ?>
              >{{ $row->district_en }} | {{ $row->district_bg }}</option>
            @endforeach
          </select>
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputName1">SubDistrict</label>
            <select class="form-control" id="subdistrict_id" name="subdistrict_id">
            <option disabled="" selected="">Select SubDistrict</option>
            @foreach($subdistricts as $row)
            <option value="{{ $row->id }}"

              <?php if ( $row->id  == $post->subdistrict_id) { echo "selected"; }  ?>
              >{{ $row->subdistrict_en }}</option>
            @endforeach
          </select>
          </div>
        </div> <!-- End row -->

<div class="row">

    <div class="form-group col-md-6">
      <label for="exampleInputName1">News Image Upload</label>
      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>

     <div class="form-group col-md-6">
      <label for="exampleInputName1">Old Image</label>
      <img src="{{ URL::to($post->image)  }}" style="width: 70px; height: 50px;">
      <input type="hidden" name="oldimage" value="{{ $post->image }}">
    </div>

  </div> <!-- End Row  --> 

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputName1">Tags English</label>
            <input type="text" class="form-control" id="exampleInputName1" name="tags_en" value="{{ $post->tags_en }}">
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputName1">Tags Hindi</label>
            <input type="text" class="form-control" id="exampleInputName1" name="tags_bg" value="{{ $post->tags_bg }}">
          </div>
        </div> <!-- End row -->


        <div class="form-group">
          <label for="exampleTextarea1">Details English</label>
          <textarea class="form-control" name="details_en" id="summernote">{{ $post->details_en }}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Details Hindi</label>
          <textarea class="form-control" name="details_bg" id="summernote1">{{ $post->details_bg }}</textarea>
        </div>

        <hr>
        <h4 class="text-center">Extra Options</h4>
        <br>

        <div class="row ml-2">

            <label class="form-check-label col-md-3">
              <input type="checkbox" name="headline" class="form-check-input" value="1" <?php if ( $post->headline  == 1) {echo "checked";}  ?>> Headline <i class="input-helper"></i></label>

              <label class="form-check-label col-md-3">
              <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1" <?php if($post->bigthumbnail == 1){ echo "checked"; } ?>> General Big Thumbnail <i class="input-helper"></i></label>

              <label class="form-check-label col-md-3">
              <input type="checkbox" name="first_section" class="form-check-input" value="1" <?php if($post->first_section == 1){ echo "checked"; } ?>> First Section <i class="input-helper"></i></label>

              <label class="form-check-label col-md-3">
  <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1" <?php if($post->first_section_thumbnail == 1){ echo "checked"; } ?>> First Section BigThumbnail <i class="input-helper"></i></label>

        </div> <!-- End row -->
      <br> <br>
        <button type="submit" class="btn btn-primary mr-2">Update</button>

      </form>
    </div>
  </div>
</div>

<!-- This AJAX is for Category -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
         url: "{{  url('/get/subcategory/') }}/"+category_id,
         type:"GET",
         dataType:"json",
                     success:function(data) {
                        $("#subcategory_id").empty();
$.each(data,function(key,value){
    $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                              });

                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>

<!-- This AJAX is for Category -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
         url: "{{  url('/get/subdistrict/') }}/"+district_id,
         type:"GET",
         dataType:"json",
                     success:function(data) {
                        $("#subdistrict_id").empty();
$.each(data,function(key,value){
    $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                              });

                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>

@else

<h2>No access</h2>

@endif

@endsection