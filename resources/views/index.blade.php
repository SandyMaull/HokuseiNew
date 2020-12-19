@extends('homelay.app')

@section('body')


	<!--- Image Slider -->
	<div id="slides" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			@foreach ($head_image as $head_img_count)
			@if ($head_img_count->bagian == 'first')
				<li data-target="#slides" data-slide-to="0" class="active"></li>
			@else
				<li data-target="#slides" data-slide-to="{{$loop->index}}"></li>
			@endif
			@endforeach
		</ol>
		<div class="carousel-inner">
			@foreach ($head_image as $head_img)

			@if ($head_img->bagian == 'first')
				<div class="carousel-item active" >
					<img src="{{ asset($head_img->image) }}" style="filter: blur(8px);-webkit-filter: blur(8px);">
					<div class="carousel-caption">
						<h1 class="display-2">{{$h1->content}}</h1>
						<h3>{{$h3->content}}</h3>
					</div>
				</div>	
			@else
				<div class="carousel-item">
					<img src="{{ asset($head_img->image) }}">
				</div>
			@endif
				
			@endforeach
		</div>
	</div>
	
	<!--- Jumbotron -->
	<div class="container-fluid">
		<div class="row jumbotron">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
				<p class="lead">{{ $head_content->content }}
				</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
				<a href="{{ url('/kegiatan') }}"><button type="button" class="btn btn-light btn-lg">>> Kegiatan Lainnya</button></a>
			</div>
		</div>
	</div>
	
	<!--- Sejarah -->
	<div class="container-fluid padding" id="Sejarah">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4" >Sejarah Hokusei</h1>
				<hr>
			</div>
			<div class="col-12">
				<p class="lead">{{$sejarah->content}}, Berikut visi dan misi Hokusei:
				</p>
			</div>
		</div>
	</div>
	
	<!--- Visi Misi -->
	<div class="container-fluid padding">
		<div class="row padding">
			<div class="col-lg-6" >
				<img src="{{ asset($sej_img->image) }}" class="img-fluid">
			</div>
			<div class="col-lg-6">
				<h2>Visi</h2>
				<p>{{$visi->content}}
				</p>
				<h2>Misi</h2>
				@foreach ($misi as $msi)

					<p>
						{{$msi->content}}
					</p>
					
				@endforeach
			</div>
		</div>
	</div>
	
	<!--- Filosofi -->
	<div class="container-fluid padding" id="Logo">
			<div class="row welcome text-center">
				<div class="col-12">
					<h1 class="display-4">Filosofi Logo Hokusei</h1>
					<hr>
				</div>
			</div>
			<div class="row padding">
				<div class="col-lg-6">
					<h5>{{$fil_content_1->bagian}}</h5>
					<p>
						{{$fil_content_1->content}}
					</p>
					<h5>{{$fil_content_2->bagian}}</h5>
					<p>
						{{$fil_content_2->content}}
					</p>
					<br>
					<a href="{{ url('/logo') }}" class="btn btn-danger">>> Selengkapnya</a>
				</div>
				<div class="col-lg-6 text-center">
					<img src="{{ asset($fil_image->image) }}" class="img-fluid" style="width:320px;height:320px;">
					
				</div>
			</div>
		</div>

	<!--- Divisi -->
	<div class="container-fluid padding" id="Pengurus">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Struktur Kepengurusan</h1>
				<hr>
			</div>
		</div>
	</div>
	
	<!--- Struktur Pengurus -->
	<div class="container-fluid padding">
		<div class="row text-center">
			@foreach ($pengurus as $urus)
				@if ($urus->jabatan == 'Kaichou')	
					<div class="col col-xs-12 col-sm-12 col-md-12">
						<img class="pengurus-img" src="{{ asset($urus->image) }}" />
						<h3>{{$urus->jabatan}}</h3>
						<p>{{$urus->nama}}</p>
					</div>
				@endif
			@endforeach
		</div>
		<div class="row text-center">
			@foreach ($pengurus as $urus)
				@if ($urus->jabatan == 'Hisho' || $urus->jabatan == 'Kaikei')
					<div class="col col-xs-6 col-sm-6 col-md-6">
						<img class="pengurus-img" src="{{ asset($urus->image) }}">
						<h3>{{$urus->jabatan}}</h3>
						<p>{{$urus->nama}}</p>
					</div>
				@endif
			@endforeach
		</div>
		<div class="row text-center">
			@foreach ($pengurus as $urus)
				@if ($urus->jabatan == 'K-KOMINFO')
					{{-- KOMINFO --}}
					<div class="col col-xs-12 col-sm-6 col-md-2-modify">
						<button class="kominfo" data-toggle="collapse" data-target="#kominfo">KOMINFO
						</button>
						<div id="kominfo" class="collapse">
							<hr>
							<div class="container-fluid padding">
								<div class="row text-center">
									<div class=" col col-xs-12 col-sm-6 col-md-12">
										<img class="pengurus-img" src="{{ asset($urus->image) }}">
										<p class="struktur-name">{{$urus->nama}}</p>
									</div>
								</div>
							</div>
							@foreach ($pengurus as $urus_2)
								@if ($urus_2->jabatan == 'KOMINFO')
									<div class="container-fluid padding">
										<div class="row text-center">
											<div class=" col col-xs-12 col-sm-6 col-md-12">
												<img class="pengurus-img" src="{{ asset($urus_2->image) }}">
												<p class="struktur-name">{{$urus_2->nama}}</p>
											</div>
										</div>
									</div>
								@endif
							@endforeach
							<hr>
						</div>
					</div>
				@endif
				@if ($urus->jabatan == 'K-PSDM')
					{{-- PSDM --}}
					<div class="col col-xs-12 col-sm-6 col-md-2-modify">
						<button class="psdm" data-toggle="collapse" data-target="#psdm">PSDM
						</button>
						<div id="psdm" class="collapse">
							<hr>
							<div class="container-fluid padding">
								<div class="row text-center">
									<div class=" col col-xs-12 col-sm-6 col-md-12">
										<img class="pengurus-img" src="{{ asset($urus->image) }}">
										<p class="struktur-name">{{$urus->nama}}</p>
									</div>
								</div>
							</div>
							@foreach ($pengurus as $urus_2)
								@if ($urus_2->jabatan == 'PSDM')
									<div class="container-fluid padding">
										<div class="row text-center">
											<div class=" col col-xs-12 col-sm-6 col-md-12">
												<img class="pengurus-img" src="{{ asset($urus_2->image) }}">
												<p class="struktur-name">{{$urus_2->nama}}</p>
											</div>
										</div>
									</div>
								@endif
							@endforeach
							<hr>
						</div>
					</div>
				@endif
				@if ($urus->jabatan == 'K-PENDIDIKAN')
					{{-- PENDIDIKAN --}}
					<div class="col col-xs-12 col-sm-6 col-md-2-modify">
						<button class="pendidikan" data-toggle="collapse" data-target="#pendidikan">PENDIDIKAN
						</button>
						<div id="pendidikan" class="collapse">
							<hr>
							<div class="container-fluid padding">
								<div class="row text-center">
									<div class=" col col-xs-12 col-sm-6 col-md-12">
										<img class="pengurus-img" src="{{ asset($urus->image) }}">
										<p class="struktur-name">{{$urus->nama}}</p>
									</div>
								</div>
							</div>
							@foreach ($pengurus as $urus_2)
								@if ($urus_2->jabatan == 'PENDIDIKAN')
									<div class="container-fluid padding">
										<div class="row text-center">
											<div class=" col col-xs-12 col-sm-6 col-md-12">
												<img class="pengurus-img" src="{{ asset($urus_2->image) }}">
												<p class="struktur-name">{{$urus_2->nama}}</p>
											</div>
										</div>
									</div>
								@endif
							@endforeach
							<hr>
						</div>
					</div>
				@endif
				@if ($urus->jabatan == 'K-KEBUDAYAAN')
					{{-- KEBUDAYAAN --}}
					<div class="col col-xs-12 col-sm-6 col-md-2-modify">
						<button class="budaya" data-toggle="collapse" data-target="#budaya">KEBUDAYAAN
						</button>
						<div id="budaya" class="collapse">
							<hr>
							<div class="container-fluid padding">
								<div class="row text-center">
									<div class=" col col-xs-12 col-sm-6 col-md-12">
										<img class="pengurus-img" src="{{ asset($urus->image) }}">
										<p class="struktur-name">{{$urus->nama}}</p>
									</div>
								</div>
							</div>
							@foreach ($pengurus as $urus_2)
								@if ($urus_2->jabatan == 'KEBUDAYAAN')
									<div class="container-fluid padding">
										<div class="row text-center">
											<div class=" col col-xs-12 col-sm-6 col-md-12">
												<img class="pengurus-img" src="{{ asset($urus_2->image) }}">
												<p class="struktur-name">{{$urus_2->nama}}</p>
											</div>
										</div>
									</div>
								@endif
							@endforeach
							<hr>
						</div>
					</div>
				@endif
				@if ($urus->jabatan == 'K-KEWIRAUSAHAAN')
					{{-- KEWIRAUSAHAAN --}}
					<div class="col col-xs-12 col-sm-6 col-md-2-modify">
						<button class="wirausaha" data-toggle="collapse" data-target="#wirausaha">KEWIRAUSAHAAN
						</button>
						<div id="wirausaha" class="collapse">
							<hr>
							<div class="container-fluid padding">
								<div class="row text-center">
									<div class=" col col-xs-12 col-sm-6 col-md-12">
										<img class="pengurus-img" src="{{ asset($urus->image) }}">
										<p class="struktur-name">{{$urus->nama}}</p>
									</div>
								</div>
							</div>
							@foreach ($pengurus as $urus_2)
								@if ($urus_2->jabatan == 'KEWIRAUSAHAAN')
									<div class="container-fluid padding">
										<div class="row text-center">
											<div class=" col col-xs-12 col-sm-6 col-md-12">
												<img class="pengurus-img" src="{{ asset($urus_2->image) }}">
												<p class="struktur-name">{{$urus_2->nama}}</p>
											</div>
										</div>
									</div>
								@endif
							@endforeach
							<hr>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
	
	<!--- HokuChan -->
	<button class="maskot" data-toggle="collapse" data-target="#maskot">OUR MASCOT!
	</button>
	<div id="maskot" class="collapse">
		<div class="container-fluid padding">
			<div class="row welcome text-center">
				<div class="col-12">
					<h1 class="display-4">HokuChan</h1>
					<hr>
				</div>
			</div>
		</div>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-sm-6 col-md-6">
					<img class="hokuchan" src="{{ asset('img/standeehokufinish.png') }}" style="width: 313px; height:547px;">
				</div>
				<div class="col-sm-6 col-md-3">
					<img class="hokuchan" src="{{ asset('img/stiker-hkuchan.png') }}" style="width: 313px; height:547px;">
				</div>
			</div>
		</div>
		<hr>
	</div>
	
	<!--- Connect -->
	<div class="container-fluid padding" id="Connect">
		<div class="row text-center padding">
				<div class="row welcome text-center">
					<div class="col-12">
						<h1 class="display-4">Connect with Hokusei!</h1>
						<hr>
					</div>
				</div>
			<div class="col-12 social padding">
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-google-plus-g"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
				<a href="#"><i class="fab fa-youtube"></i></a>
			</div>
		</div>
	</div>


@endsection