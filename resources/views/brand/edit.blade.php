@extends('backendtemplate')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="fa fa-dashboard"></i> Brand Edit Form </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<a href="{{route('brand.index')}}" class="btn btn-primary">Back</a>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

						<div class="form-group row">
							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
							<div class="col-sm-10">
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name_id" name="name" value="{{$brand->name}}">
								@error('name')
					                <span class="invalid-feedback" role="alert">
					                	<strong>{{ $message }}</strong>
					                </span>
					            @enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="photo_id" class="col-sm-2 col-form-label"> Photo <small class="text-danger"> (* jpeg | jpg | png) </small></label>
							<div class="col-9 col-sm-9 col-md-10 col-lg-10">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a href="#oldphoto" class="nav-link active" id="oldphoto_tab" data-toggle="tab" role="tab" aria-controls="oldphoto" aria-selected="true">Old photo</a>
									</li>
									<li class="nav-item">
										<a href="#newphoto" class="nav-link" id="newphoto_tab" data-toggle="tab" role="tab" aria-controls="newphoto" aria-selected="false">New photo</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="oldphoto" role="tab-panel" aria-labelledby="oldphoto_tab">
										<img src="{{asset($brand->photo)}}" width="100px" height="100px" id="add_image" class="img-fluid">
										<input type="hidden" name="oldphoto" value="{{$brand->photo}}">
									</div>
									<div class="tab-pane fade" id="newphoto" role="tab-panel" aria-labelledby="newphoto_tab">
										<input type="file" id="add_newphoto" name="add_newphoto" class="form-control-file @error('photo') is-invalid @enderror">
										@error('photo')
							                <span class="invalid-feedback" role="alert">
							                	<strong>{{ $message }}</strong>
							                </span>
							            @enderror
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-floppy-o"></i>
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection