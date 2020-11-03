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
					<img src="{{asset($item->photo)}}" class="img-fluid" style="width: 200px;height: 200px;object-fit: cover;">
					<h3 class="mt-5">{{$item->name}}</h3>
					@php
					if( $item->discount > 0)
						echo "<span class='text-danger'> $item->discount Ks</span> <br><del>$item->price Ks</del>";
					else
						echo "<span class='text-danger'> $item->price Ks</span>";
					@endphp
				</div>
			</div>
		</div>
	</div>
</main>
@endsection