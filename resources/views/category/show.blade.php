@extends('backendtemplate')
@section('content')
	<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="fa fa-dashboard"></i> Category Detail </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<img src="{{asset($category->photo)}}" class="img-fluid" style="width: 200px;height: 200px;object-fit: cover;">
					<h3 class="mt-5">{{$category->name}}</h3>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection