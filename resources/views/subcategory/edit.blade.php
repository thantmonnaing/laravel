@extends('backendtemplate')
@section('content')
<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="fa fa-dashboard"></i> Category Edit Form </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<form action="{{route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

						<div class="form-group row">
							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
							<div class="col-sm-10">
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name_id" name="name" value="{{$subcategory->name}}">
								@error('name')
					                <span class="invalid-feedback" role="alert">
					                	<strong>{{ $message }}</strong>
					                </span>
					            @enderror
							</div>
						</div>

						<div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
                            <div class="col-sm-10">
                                <select class="custom-select @error('category') is-invalid @enderror" id="category_id" name="category">
                                    @foreach($categories as $c_row)
                                    	<option value={{$c_row->id}} 
                                    		@php 
                                    		if($c_row->id == $subcategory->category_id) 
                                    			echo "selected";
                                    		@endphp>{{$c_row->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
					                <span class="invalid-feedback" role="alert">
					                	<strong>{{ $message }}</strong>
					                </span>
					            @enderror
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