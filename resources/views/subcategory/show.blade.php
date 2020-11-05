@extends('backendtemplate')
@section('content')
	<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="fa fa-dashboard"></i> Subcategory Detail </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<h3 class="my-5">Subcategory Name : <small class="text-danger"> {{$subcategory->name}}</small></h3>
					<h3 class="my-5">Category Name : <small class="text-danger">{{$subcategory->category->name}}</small></h3>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection