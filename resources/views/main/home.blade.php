@extends('main.home_master')

@section('content')

@php

$firstsectionbig = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();
$firstsection = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(8)->get();


@endphp 


<style>
 


.news-image {
    width: 100% !important;
    height: 150px !important;
    object-fit: cover;
}
.news-item {
    width: 100%;
    height: 200px;
}</style>

<!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">

	 <div class="service-img"><a href="{{ URL::to('view/post/' . $firstsectionbig->slug) }}"><img src="{{ asset($firstsectionbig->image) }}" width="800px" alt="First Section BigThumbnail"></a></div>
								<div class="content">
		 <h4 class="lead-heading-01">
		 	<a href="{{ URL::to('view/post/' . $firstsectionbig->slug) }}">

		 	@if(session()->get('lang') == 'hindi')
			{{ $firstsectionbig->title_bg }}
			@else
			{{ $firstsectionbig->title_en }}
			@endif 

		</a> </h4>
								</div>
							</div>
						</div>
						
					</div>
						<div class="row">

							@foreach($firstsection as $row)

								<div class="col-md-3 col-sm-3 deep">
									<div class="top-news news-item">
										<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook" class="img-fluid news-image"></a>
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
					
	<!-- add-start -->	
	<div class="row">
		<div class="col-md-12 col-sm-12">

@php
	$horizontal = DB::table('ads')->where('type',2)->skip(1)->first();
@endphp

			<div class="add">
				@if($horizontal == NULL)
						@else
						<a href="{{ $horizontal->link }}" target="_blank">
							<img src="{{ asset($horizontal->ads) }}" alt="" />
						</a>
						@endif
						
			</div>
		</div>
	</div>
	<!-- /.add-close -->	
	
	<!--Google Ad Horizontal start-->
	
<!--	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Home Page Top Horizontal -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="9855196681"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
	
	<!--Google Ad Horizontal stop-->
	
	<!-- news-start -->
	<div class="row">

@php
$firstcategory = DB::table('categories')->first();

$firstcatpostbig = DB::table('posts')->where('category_id', $firstcategory->id)->where('bigthumbnail',1)->orderBy('id', 'DESC')->first();

$firstcatpostsmall = DB::table('posts')->where('category_id', $firstcategory->id)->where('bigthumbnail',NULL)->orderBy('id', 'DESC')->limit(3)->get();


@endphp

<div class="col-md-6 col-sm-6">
	<div class="bg-one">
		<div class="cetagory-title"><a href="{{ URL::to('catpost/'. $firstcategory->id . '/' . $firstcategory->category_en) }}">

			@if(session()->get('lang') == 'hindi')
			{{ $firstcategory->category_bg }}
			@else
			{{ $firstcategory->category_en }}
			@endif 

			</a></div>
		<div class="row">


			<div class="col-md-6 col-sm-6">
				<div class="top-news">
					<a href="{{ URL::to('view/post/' . $firstcatpostbig->slug) }}"><img src="{{ asset($firstcatpostbig->image) }}" alt="Notebook"></a>
					<h4 class="heading-02"><a href="{{ URL::to('view/post/' . $firstcatpostbig->slug) }}">
						
						@if(session()->get('lang') == 'hindi')
						{{ $firstcatpostbig->title_bg }}
						@else
						{{ $firstcatpostbig->title_en }}
						@endif

					</a> </h4>
				</div>
			</div>


			<div class="col-md-6 col-sm-6">
				@foreach($firstcatpostsmall as $row)
				<div class="image-title">
					<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
						@if(session()->get('lang') == 'hindi')
						{{$row->title_bg}}
						@else
						{{$row->title_en}}
						@endif
					</a> </h4>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>


@php

$secondcategory = DB::table('categories')->skip(1)->first();

$secondcatpostbig = DB::table('posts')->where('category_id', $secondcategory->id)->where('bigthumbnail',1)->orderBy('id', 'DESC')->first();

$secondcatpostsmall = DB::table('posts')->where('category_id', $secondcategory->id)->where('bigthumbnail',NULL)->orderBy('id', 'DESC')->limit(3)->get();

@endphp


<div class="col-md-6 col-sm-6">
	<div class="bg-one">
		<div class="cetagory-title"><a href="{{ URL::to('catpost/'. $secondcategory->id . '/' . $secondcategory->category_en) }}">
			@if(session()->get('lang') == 'hindi')
			{{ $secondcategory->category_bg }}
			@else
			{{ $secondcategory->category_en }}
			@endif 
	</a></div>
		<div class="row">

			<div class="col-md-6 col-sm-6">
				<div class="top-news">
					<a href="{{ URL::to('view/post/' . $secondcatpostbig->slug) }}"><img src="{{ asset($secondcatpostbig->image) }}" alt="Notebook"></a>
					<h4 class="heading-02"><a href="{{ URL::to('view/post/' . $secondcatpostbig->slug) }}">
						
						@if(session()->get('lang') == 'hindi')
						{{ $secondcatpostbig->title_bg }}
						@else
						{{ $secondcatpostbig->title_en }}
						@endif

					</a> </h4>
				</div>
			</div>


			<div class="col-md-6 col-sm-6">
				@foreach($secondcatpostsmall as $row)
				<div class="image-title">
					<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
					<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
						@if(session()->get('lang') == 'hindi')
						{{$row->title_bg}}
						@else
						{{$row->title_en}}
						@endif
					</a> </h4>
				</div>
				@endforeach
			</div>

				</div>
			</div>
		</div>
	</div>					
</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
@php
	$vertical = DB::table('ads')->where('type',1)->first();
@endphp

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
					
					<!--google add vertical start-->
					
<!--						<div class="row">-->
<!--						<div class="col-md-12 col-sm-12">-->
<!--							<div class="sidebar-add">-->
<!--									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Home Page Verticle -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="9783329902"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					


					<!--google add vertical stop-->
					

					@php 

					$livetv = DB::table('livetvs')->first();

					@endphp

					@if($livetv->status == 1)

					<!-- youtube-live-start -->	
					<div class="cetagory-title-03">
						@if(session()->get('lang') == 'hindi')
						लाइव टीवी
						@else
						Live TV
						@endif
					</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
			 			
			 			{!! $livetv->embed_code !!}


						</div>
					</div><!-- /.youtube-live-close -->	
					
					@endif

					<!-- facebook-page-start -->
					
					<div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="9Usqhzl7"></script>	

					<!--<div class="fb-page" data-href="https://www.facebook.com/LaravelCommunity" data-tabs="" data-width="270" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/LaravelCommunity" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/LaravelCommunity">Laravel</a></blockquote></div>-->


	@php
	$vertical = DB::table('ads')->where('type',1)->skip(1)->first();
	@endphp
					
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
					<!--google add vertical start-->
<!--					<div class="row">-->
<!--						<div class="col-md-12 col-sm-12">-->
<!--						<div class="sidebar-add">-->
<!--					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Home Page Verticle Second -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="6278327023"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					<!--google add vertical stop-->
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">

@php

$thirdcategory = DB::table('categories')->skip(2)->first();

$thirdcatpostbig = DB::table('posts')->where('category_id', $thirdcategory->id)->where('bigthumbnail',1)->orderBy('id', 'DESC')->first();

$thirdcatpostsmall = DB::table('posts')->where('category_id', $thirdcategory->id)->where('bigthumbnail',NULL)->orderBy('id', 'DESC')->limit(3)->get();

@endphp

				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="{{ URL::to('catpost/'. $thirdcategory->id . '/' . $thirdcategory->category_en) }}">


					@if(session()->get('lang') == 'hindi')
					{{ $thirdcategory->category_bg }}
					@else
					{{ $thirdcategory->category_en }}
					@endif 	 

						</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{ URL::to('view/post/' . $thirdcatpostbig->slug) }}"><img src="{{ asset($thirdcatpostbig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('view/post/' . $thirdcatpostbig->slug) }}">@if(session()->get('lang') == 'hindi')
									{{ $thirdcatpostbig->title_bg }}
									@else
									{{ $thirdcatpostbig->title_en }}
									@endif

									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
							@foreach($thirdcatpostsmall as $row)
							<div class="image-title">
								<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
									@if(session()->get('lang') == 'hindi')
									{{$row->title_bg}}
									@else
									{{$row->title_en}}
									@endif
								</a> </h4>
							</div>
							@endforeach
						</div>
						</div>
					</div>
				</div>


@php

$fourthcategory = DB::table('categories')->skip(3)->first();

$fourthcatpostbig = DB::table('posts')->where('category_id', $fourthcategory->id)->where('bigthumbnail',1)->orderBy('id', 'DESC')->first();

$fourthcatpostsmall = DB::table('posts')->where('category_id', $fourthcategory->id)->where('bigthumbnail',NULL)->orderBy('id', 'DESC')->limit(3)->get();

@endphp


				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="{{ URL::to('catpost/'. $fourthcategory->id . '/' . $fourthcategory->category_en) }}">


					@if(session()->get('lang') == 'hindi')
					{{ $fourthcategory->category_bg }}
					@else
					{{ $fourthcategory->category_en }}
					@endif  
				 
						</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{ URL::to('view/post/' . $fourthcatpostbig->slug) }}"><img src="{{ asset($fourthcatpostbig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('view/post/' . $fourthcatpostbig->slug) }}">@if(session()->get('lang') == 'hindi')
									{{ $fourthcatpostbig->title_bg }}
									@else
									{{ $fourthcatpostbig->title_en }}
									@endif

									</a> </h4>
								</div>
							</div>
						
							<div class="col-md-6 col-sm-6">
							@foreach($fourthcatpostsmall as $row)
							<div class="image-title">
								<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
									@if(session()->get('lang') == 'hindi')
									{{$row->title_bg}}
									@else
									{{$row->title_en}}
									@endif
								</a> </h4>
							</div>
							@endforeach
						</div>
						</div>
					</div>
				</div>

			</div>
			<!-- ******* -->
<!-- 			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
@php
	$horizontal = DB::table('ads')->where('type',2)->skip(2)->first();
@endphp
			
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add">
				@if($horizontal == NULL)
						@else
						<a href="{{ $horizontal->link }}" target="_blank">
							<img src="{{ asset($horizontal->ads) }}" alt="" />
						</a>
						@endif
					</div>
				</div>
@php
	$horizontal = DB::table('ads')->where('type',2)->skip(1)->first();
@endphp
				<div class="col-md-6 col-sm-6">
					<div class="add">
				@if($horizontal == NULL)
						@else
						<a href="{{ $horizontal->link }}" target="_blank">
							<img src="{{ asset($horizontal->ads) }}" alt="" />
						</a>
						@endif
					</div>
				</div>
			</div><!-- /.add-close -->	
			<!--google add horizontal start-->
<!--				<div class="row">-->
<!--				<div class="col-md-6 col-sm-6">-->
<!--					<div class="add">-->
<!--		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- home page horizontal midd -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="7939765196"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="col-md-6 col-sm-6">-->
<!--					<div class="add">-->
<!--			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- google home horizontal midd second -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="9061275176"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
			<!--google add horizontal stop-->
		</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">

@php

$fifthcategory = DB::table('categories')->skip(4)->first();

$fifthcatpostbig = DB::table('posts')->where('category_id', $fifthcategory->id)->where('bigthumbnail',1)->orderBy('id', 'DESC')->first();

$fifthcatpostsmall = DB::table('posts')->where('category_id', $fifthcategory->id)->where('bigthumbnail',NULL)->orderBy('id', 'DESC')->limit(3)->get();

$fifthcatpostsmallskip = DB::table('posts')->skip(3)->where('category_id', $fifthcategory->id)->where('bigthumbnail',NULL)->orderBy('id', 'DESC')->limit(3)->get();

@endphp

				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="{{ URL::to('catpost/'. $fifthcategory->id . '/' . $fifthcategory->category_en) }}">


					@if(session()->get('lang') == 'hindi')
					{{ $fifthcategory->category_bg }}
					@else
					{{ $fifthcategory->category_en }}
					@endif 

						</span></a></div>

					
					<div class="row">

						<div class="col-md-4 col-sm-4">
							<div class="top-news">
									<a href="{{ URL::to('view/post/' . $fifthcatpostbig->slug) }}"><img src="{{ asset($fifthcatpostbig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{ URL::to('view/post/' . $fifthcatpostbig->slug) }}">@if(session()->get('lang') == 'hindi')
									{{ $fifthcatpostbig->title_bg }}
									@else
									{{ $fifthcatpostbig->title_en }}
									@endif

									</a> </h4>
								</div>
						</div>


						<div class="col-md-4 col-sm-4">
							@foreach($fifthcatpostsmall as $row)
							<div class="image-title">
								<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
									@if(session()->get('lang') == 'hindi')
									{{$row->title_bg}}
									@else
									{{$row->title_en}}
									@endif
								</a> </h4>
							</div>
							@endforeach
						</div>
						<div class="col-md-4 col-sm-4">
							@foreach($fifthcatpostsmallskip as $row)
							<div class="image-title">
								<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="{{ URL::to('view/post/' . $row->slug) }}">
									@if(session()->get('lang') == 'hindi')
									{{$row->title_bg}}
									@else
									{{$row->title_en}}
									@endif
								</a> </h4>
							</div>
							@endforeach
						</div>
					</div>
					<!-- ******* -->
					<br />
					
					
<!-- 					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
						</div>
					</div> -->
					
					{{-- example add --}}

					<!-- <div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{ asset('frontend/assets/img/test.jpg') }}" alt="" />
							</div>
						</div>
					</div> -->

					<!-- /.add-close -->	

<br><br>
<div class="container" style="width:100%;">
			<div class="row">

@php

$district = DB::table('districts')->get();

@endphp

				<div class="cetagory-title-02 h3">		@if(session()->get('lang') == 'hindi')
					जिले द्वारा खोजें:
					@else
					Search by District:
					@endif
					</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<form action="{{ route('searchby.districts') }}" method="GET">
					@csrf
						<div class="row">
							<div class="col-lg-4">
		<select class="form-control" id="exampleSelectGender" name="district_id">
            <option disabled="" selected="">
            		@if(session()->get('lang') == 'hindi')
					जिला चुनें:
					@else
					Select District:
					@endif
			</option>
            @foreach($district as $row)
            <option value="{{ $row->id }}">
            	@if(session()->get('lang') == 'hindi')
				{{ $row->district_bg }}
				@else
				{{ $row->district_en }}
				@endif
            </option>
            @endforeach
         </select>
							</div>
							<div class="col-lg-4">
		<select class="form-control" id="subdistrict_id" name="subdistrict_id">
            <option disabled="" selected="">
            	@if(session()->get('lang') == 'hindi')
				उप-जिला का चयन करें:
				@else
				Select SubDistrict:
				@endif
            </option>
         </select>
							</div>
							<div class="col-lg-4">
								<button class="btn btn-success btn-block" id="jsbutton" disabled>
				@if(session()->get('lang') == 'hindi')
				खोज:
				@else
				Search:
				@endif
								</button>
							</div>
						</div>
				</form>
			</div>
			<br><br>
				</div>
				</div>
				

@php

$latest = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();

$highest = DB::table('posts')->orderBy('id', 'asc')->inRandomOrder()->limit(5)->get();

@endphp

				<div class="col-md-3 col-sm-3">
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

						<!-- Tab panes -->
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
<!-- 					<div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div>
				   </form> -->
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04"> 

				   		@if(session()->get('lang') == 'hindi')
						महत्वपूर्ण वेबसाइटें
						@else
						Important Websites
						@endif

				   </div>
				   <div class="">

				   	@php

				   	$website = DB::table('websites')->get();

				   	@endphp

				   	@foreach($website as $row)
				   	<div class="news-title-02">
				   		<h4 class="heading-03"><a href="{{ $row->website_link }}"><i class="fa fa-check" aria-hidden="true"></i> {{ $row->website_name }}  </a> </h4>
				   	</div>
				   	@endforeach
				  
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	
@php

$photobig = DB::table('photos')->where('type', 1)->orderBy('id','desc')->first();

$photosmall = DB::table('photos')->where('type',0)->orderBy('id', 'desc')->limit(5)->get();

@endphp

	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title">
						@if(session()->get('lang') == 'hindi')
						चित्र प्रदर्शनी
						@else
						Photo Gallery
						@endif
					</div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{ asset($photobig->photo) }}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            
	                            @foreach($photosmall as $row)
	                            <div class="photo_border active">
	                                <img src="{{ asset($row->photo) }}" alt="image" onclick="currentDiv(1)" style="width:100%">
	                                <div class="heading-03">
	                                    {{ $row->title }}
	                                </div>
	                            </div>
	                            @endforeach

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> 
					@if(session()->get('lang') == 'hindi')
					वीडियो गैलरी
					@else
					Video Gallery
					@endif 
				</div>

@php

$videobig = DB::table('videos')->where('type', 1)->orderBy('id','desc')->first();

$videosmall = DB::table('videos')->where('type',0)->orderBy('id', 'desc')->limit(4)->get();

@endphp

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
     <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $videobig->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="video_screen">
                           <div class="gallery_sec owl-carousel">
        

                            	@foreach($videosmall as $row)
		<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
		<iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		                                </div>
                                @endforeach

                         </div>
                          
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
		</div>
	</section><!-- /.gallery-section-close -->



<!-- This AJAX is for Category -->
<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
         url: "{{  url('/get/subdistrict/frontend') }}/"+district_id,
         type:"GET",
         dataType:"json",
                     success:function(data) {
                     	$("#jsbutton").removeAttr('disabled');
                        $("#subdistrict_id").empty();
$.each(data,function(key,value){
	@if(session()->get('lang') == 'hindi')
	$("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_bg+'</option>');
	@else
	$("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
	@endif
    
                              });

                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>

@endsection