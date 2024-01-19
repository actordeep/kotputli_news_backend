@extends('main.home_master')

@section('content')

	@if(session()->get('lang') == 'hindi')
	@section('meta_title', $post->title_bg)
    @section('meta_description', $post->title_bg)
    @section('meta_keyword', $post->tags_bg)
 
	@else
	@section('meta_title', $post->title_en)
    @section('meta_description', $post->title_en)
    @section('meta_keyword', $post->tags_en)
	@endif 

<style>
/*.deep-news-item {*/
/*    width: 100%;*/
/*    height: 225px;*/
/*}*/

.news-image {
    width: 100% !important;
    height: 440px !important;
    object-fit: cover;
    box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 10px 8px, rgba(0, 0, 0, 0.09) 0px 10px 7px;
}
.news-item {
    width: 100%;
}
</style>
<!-- single-page-start -->
	
	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a></li>					   
						<li>
							@if(session()->get('lang') == 'hindi')
							{{ $post->category_bg }}
							@else
							{{ $post->category_en }}
							@endif
						</li>
						<li>
							@if(session()->get('lang') == 'hindi')
							{{ $post->subcategory_bg }}
							@else
							{{ $post->subcategory_en }}
							@endif
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
					<b><h1 class="headline">
							@if(session()->get('lang') == 'hindi')
							{{ $post->title_bg }}
							@else
							{{ $post->title_en }}
							@endif
						</h1></b>	
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>
							{{ $post->name }}
						  </li>     <li><i class="fa fa-clock-o"></i> {{ $post->post_date }} </li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
										   
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news news-item">
					<img src="{{ asset($post->image) }}" alt="" class="news-image"/>
					<b>
					<h4 class="caption"> 
						@if(session()->get('lang') == 'hindi')
						{{ $post->title_bg }}
						@else
						{{ $post->title_en }}
						@endif
					 </h4>
					 </b>
					<p>
						@if(session()->get('lang') == 'hindi')
						{!! $post->details_bg !!}
						@else
						{!! $post->details_en !!}
						@endif
					</p>
				</div>
				<!-- ********* -->

<div class="sharethis-inline-share-buttons"></div>
<br><br>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="HI1NMq9Z"></script>

<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8"></div>
<!-- Request::url() this way we see different types of comments on each page -->
@php

$more = DB::table('posts')->where('category_id', $post->category_id)->orderBy('id', 'desc')->limit(6)->get();

@endphp


				<div class="row">
					<div class="col-md-12"><h2 class="heading">
					@if(session()->get('lang') == 'hindi')
					सम्बंधित खबर
					@else
					Related news
					@endif
				</h2></div>
				@foreach($more as $row)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm news-item">
							<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" style="width: 100% !important;
    height: 150px !important;
    object-fit: cover;"></a>
							<h4 class="heading-02"><a href="{{ URL::to('view/post/' . $row->slug) }}">
								@if(session()->get('lang') == 'hindi')
								{{ Str::limit($row->title_bg, 50) }}
								@else
								{{ Str::limit($row->title_en, 50) }}
								@endif
							</a> </h4>
						</div>
					</div>
				@endforeach


				</div>
 
			</div>

@php
	$vertical = DB::table('ads')->where('type',1)->first();
@endphp

			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
						@if($vertical == NULL)
						@else
						<a href="{{ $vertical->link }}" target="_blank">
							<img src="{{ asset($vertical->ads) }}" alt="" />
						</a>
						@endif
							</div>
						</div>
					</div><!-- /.add-close -->

@php

$latest = DB::table('posts')->orderBy('id', 'desc')->limit(8)->get();

$highest = DB::table('posts')->orderBy('id', 'asc')->inRandomOrder()->limit(8)->get();

@endphp
<!--google add verticle start-->

<!--	<div class="row">-->
<!--						<div class="col-md-12 col-sm-12">-->
<!--							<div class="sidebar-add">-->
<!--					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Single Post VerticalFirst -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="2526784277"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--google add verticle stop-->

				<div class="tab-header">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
							@if(session()->get('lang') == 'hindi')
							नवीनतम
							@else
							Latest
							@endif
							</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
							@if(session()->get('lang') == 'hindi')
							उच्चतम
							@else
							Highest
							@endif
						</a></li>
						</ul>
		
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">

									@foreach($latest as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
								@if(session()->get('lang') == 'hindi')
								{{ $row->title_bg }}
								@else
								{{ $row->title_en }}
								@endif
										</a> </h4>
									</div>
									@endforeach
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									@foreach($highest as $row)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
								@if(session()->get('lang') == 'hindi')
								{{ $row->title_bg }}
								@else
								{{ $row->title_en }}
								@endif
										</a> </h4>
									</div>
									@endforeach
								</div>   						                                          
							</div>
						</div>
				</div>
				<!-- add-start -->	

@php
	$vertical = DB::table('ads')->where('type',1)->skip(1)->first();
@endphp

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
						@if($vertical == NULL)
						@else
						<a href="{{ $vertical->link }}" target="_blank">
							<img src="{{ asset($vertical->ads) }}" alt="" />
						</a>
						@endif
							</div>
						</div>
					</div><!-- /.add-close -->
					
					<!--google add verticle start-->
					
<!--						<div class="row">-->
<!--						<div class="col-md-12 col-sm-12">-->
<!--							<div class="sidebar-add">-->
<!--				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Single Post Vertical Second -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="1214289330"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					
					<!--google add verticle stop-->
			</div>
		  </div>
		</div>
	</section>

@endsection


