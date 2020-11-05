@extends('backendtemplate')
@section('content')
	<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="fa fa-dashboard"></i> Item Detail </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<a href="{{route('item.index')}}" class="btn btn-primary">Back</a>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">

					<div class="row m-5">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<img src="{{asset($item->photo)}}" class="img-fluid">
						</div>	


						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

							<h4> {{$item->name}} </h4>

							<p> {{$item->codeno}}</p>

							<p> {{$item->brand->name}}</p>

							<p> {{$item->subcategory->name}}</p>

							<p> 
								@if( $item->discount > 0)
									<span class='text-uppercase'> Discount : </span><span class='text-danger'> {{$item->discount}} Ks</span> <br><span class='text-uppercase'> Current Price : </span><del>{{$item->price}} Ks</del>
								@else
									<span class='text-uppercase'> Current Price : </span><span class='text-danger'>{{$item->price}} Ks</span>
								@endif			

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection