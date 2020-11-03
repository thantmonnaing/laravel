@extends('backendtemplate')
@section('content')

<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Category Create Form </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
						<div class="form-group row">
							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
							<div class="col-sm-10">
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name_id" name="name">
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
                                    <option selected hidden value="">Choose Category</option>
                                    @foreach($categories as $c_row)
                                    	<option value={{$c_row->id}}>{{$c_row->name}}</option>
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
								<button type="submit" class="btn btn-primary" name="btnsubmit" value="Save">
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