@extends('showroom2.layouts.visit')

@section('title', 'Tenant-Dashboard')

@section('content')
<div class="row ">
	<div class="col-2 sticky">
		<a href="#autoShops" class="d-block btn"><span>Autoshops</span></a>
		<a href="#cars" class="d-block btn"><span>Cars</span></a>
		<a href="#merchandise" class="d-block btn"><span>Merchandise</span></a>
	</div>
	<div class="col-9">

		<!-- Total Upload -->
		<div class="row text-center mb-3">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Autoshop Review</h5>
					    <p class="card-text"><h3>8</h3></p>
					</div>
					<a href="/showroom/upload/autoshop" class="card-link">Add Autoshop</a>
					<!-- <a href="">Edit Autoshop</a> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Merchandise Total</h5>
					    <p class="card-text"><h3>6</h3></p>
					</div>
					<a href="#" class="card-link">Add Merchandise</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Cars Total</h5>
					    <p class="card-text"><h3>6</h3></p>
					</div>
					<a href="/showroom/upload/car" class="card-link">Sell Cars</a>
				</div>
			</div>
		</div>
		<!-- End Total Upload-->
			<hr>
		<!-- cars -->
		<div id="cars">
			<div class="text-center"><h4>Cars</h4></div>
			<div class="row">
				@foreach($SR as $item => $sr)
	            <div class="col-md-4">
	                <div class="trainer-item">
	                    <div class="image-thumb">
	                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectSR[$item]) }}" height="400">
	                    </div>
	                    <div class="down-content">
	                        <span>
	                            <sup>Rp</sup> @convert($sr->harga) 
	                        </span>

	                        <a href="{{ '/showroom/car/'.$sr->id.'-'.$sr->slug }}"><h4>{{ $sr->judul }}</h4></a>

	                        <p>
	                        	@if($sr->verified == NULL)
	                        		<p>Menunggu verifikasi admin</p>
	                        	@endif
	                            <i class="fa fa-car"></i> {{ $sr->kondisi }} &nbsp;&nbsp;&nbsp;
	                            <i class="fa fa-cube"></i> {{ $sr->mesin }} cc &nbsp;&nbsp;&nbsp;
	                            <i class="fa fa-cog"></i> {{ $sr->transmisi }} &nbsp;&nbsp;&nbsp;
	                        </p>
	                    </div>
	                </div>
	            </div>
	            @endforeach
			</div>
		</div>
		<!-- end cars -->

	</div>
</div>
@endsection