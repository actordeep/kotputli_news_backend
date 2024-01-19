@extends('main.home_master')

@section('content')

<!-- archive_page-start -->
	<section class="single_page">						
		<div class="container-fluid">											
		<div class="row">
			
			<div class="col-md-12">

				<div class="single_info">
					<span>
						<a href="{{ URL::to('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a> |
						<a href="">
							@if(session()->get('lang') == 'hindi')
							{{ $subcatname->subcategory_bg }} 
							@else
							{{ $subcatname->subcategory_en }} 
							@endif
						</i>
					</span>	

				</div>
			</div>
			<div class="col-md-9 col-sm-8">
			@foreach($subcatposts as $row)
				<div class="archive_post_sec_again">
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="archive_img_again">
								<a href="{{ URL::to('view/post/' . $row->slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
							</div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="archive_padding_again">
								<div class="archive_heading_01">
									<a href="{{ URL::to('view/post/' . $row->slug) }}">
							@if(session()->get('lang') == 'hindi')
							{{ $row->title_bg }}
							@else
							{{ $row->title_en }}
							@endif
									</a>
								</div>
								<div class="archive_dtails">
							@if(session()->get('lang') == 'hindi')
							{!! Str::limit($row->details_bg, 200) !!}
							@else
							{!! Str::limit($row->details_en, 200) !!}
							@endif
								</div>
								<div class="dtails_btn"><a href="{{ URL::to('view/post/' . $row->slug) }}">
							@if(session()->get('lang') == 'hindi')
							अधिक पढ़ें...
							@else
							Read More...
							@endif
								</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach  

			{{ $subcatposts->links() }}
			
			</div>
@php
	$vertical = DB::table('ads')->where('type',1)->first();
@endphp

			<div class="col-md-3 col-sm-4">
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

<!--google vertical add start-->
<!--	<div class="row">-->
<!--						<div class="col-md-12 col-sm-12">-->
<!--						<div class="sidebar-add">-->
<!--					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Subpost Vertical First -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="9830559228"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--google vertical add stop-->


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
					
					<!--google verticle add second start-->
<!--						<div class="row">-->
<!--						<div class="col-md-12 col-sm-12">-->
<!--						<div class="sidebar-add">-->
<!--					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"-->
<!--     crossorigin="anonymous"></script>-->
<!-- Subpost Vertical Second -->
<!--<ins class="adsbygoogle"-->
<!--     style="display:block"-->
<!--     data-ad-client="ca-pub-2972675998911168"-->
<!--     data-ad-slot="8325905861"-->
<!--     data-ad-format="auto"-->
<!--     data-full-width-responsive="true"></ins>-->
<!--<script>-->
<!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
<!--</script>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					<!--google verticle add second stop-->

			</div>			
		</div>
	</div>
</section>

@endsection