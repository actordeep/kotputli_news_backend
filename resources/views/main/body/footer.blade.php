	<!-- top-footer-start -->
@php	
$websitesetting = DB::table('websitesettings')->first();
$social = DB::table('socials')->first();
@endphp
	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo">

							<img src="{{ URL::to($websitesetting->logo) }}" style="height: 50px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="{{ $social->facebook }}" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $social->twitter }}" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $social->instagram }}" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                {{-- <li><a href="#" target="_blank" class="android"> <i class="fa fa-android"></i></a></li> --}}
                                {{-- <li><a href="#" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li> --}}
                                <li><a href="{{ $social->youtube }}" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div> 
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li><a href="#"><img src="{{ asset('frontend/assets/img/apps-01.png') }}" alt="" /></a></li>
								<li><a href="#"><img src="{{ asset('frontend/assets/img/apps-02.png') }}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->
	
	<!-- middle-footer-start -->	
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="editor-one">
					@if(session()->get('lang') == 'hindi')
					कंपनी का पता:
					@else
					Comapny Address:
					@endif
					{!! $websitesetting->address !!}
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-two">
					@if(session()->get('lang') == 'hindi')
					फ़ोन नंबर:
					<br>
					{{ $websitesetting->phone_bg }}
					@else
					Phone number:
					<br>
					<a href="tel:{{ $websitesetting->phone_en }}" style="color: yellow;">{{ $websitesetting->phone_en }}</a>
					@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
					@if(session()->get('lang') == 'hindi')
					मेल पता:
					@else
					Email Address:
					@endif
						<br>
						<a href="mailto:{{ $websitesetting->email }}" style="text-decoration: none; color:white;">{{ $websitesetting->email }}</a>
						
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.middle-footer-close -->
	
	<!-- bottom-footer-start -->	
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-6" style="text-align: center;">
					<div class="copyright">						
						@if(session()->get('lang') == 'hindi')
						सर्वाधिकार सुरक्षित कोटपूतली न्यूज © 2023
						@else
						All rights reserved Kotputli News © 2023
						@endif 
					</div>
				</div>
<!-- 				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li><a href="#">About US</a></li>
							<li><a href="#">Contact US</a></li>
						</ul>
					</div>
				</div> -->
			</div>
		</div>
	</section>