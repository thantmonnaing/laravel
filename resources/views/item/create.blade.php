@extends('backendtemplate')
@section('content')

<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Item Create Form </h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('item.index')}}" class="btn btn-primary">Back</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
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
 							<label for="photo_id" class="col-sm-2 col-form-label"> Photo <small class="text-danger"> (* jpeg | jpg | png) </small></label>
 							<div class="col-sm-10">
 								<input type="file" id="photo_id" name="photo"  class="form-control-file @error('photo') is-invalid @enderror">
 								@error('photo')
					                <span class="invalid-feedback" role="alert">
					                	<strong>{{ $message }}</strong>
					                </span>
					            @enderror
 							</div>
 						</div>

 						<!-- price -->
 						<div class="form-group row">
 							<label for="price_id" class="col-sm-2 col-form-label"> Price </label>
 							<div class="col-sm-10">
 								<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#price" role="tab" aria-controls="price" aria-selected="true" data-toggle="tab" id="price_tab">Unit Price</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#discount" role="tab" aria-controls="discount" aria-selected="false" data-toggle="tab" id="discount_tab">Discount</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="price" role="tab-panel" aria-labelledby="price_tab">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price_id" name="price">
                                        @error('price')
							                <span class="invalid-feedback" role="alert">
							                	<strong>{{ $message }}</strong>
							                </span>
							            @enderror
                                    </div>
                                    <div class="tab-pane fade" id="discount" role="tab-panel" aria-labelledby="discount_tab">
                                        <input type="number" class="form-control" id="discount_id" name="discount">
                                    </div>
                                </div>
                            </div>
 						</div>						

 						<div class="form-group row">
 							<label for="desc_id" class="col-sm-2 col-form-label"> Description </label>
 							<div class="col-sm-10">
 								<textarea id="desc_id" name="description" class="form-control @error('description') is-invalid @enderror" rows="2"></textarea>
 								@error('description')
					                <span class="invalid-feedback" role="alert">
					                	<strong>{{ $message }}</strong>
					                </span>
					            @enderror
 							</div>
 						</div>

 						<div class="form-group row">
                            <label for="brand_id" class="col-sm-2 col-form-label"> Brand </label>
                            <div class="col-sm-10">
                                <select class="custom-select  @error('brand') is-invalid @enderror" id="brand_id" name="brand">
                                    <option selected hidden value="">Choose Brand</option>
                                    @foreach($brands as $b_row)
                                    	<option value={{$b_row->id}}>{{$b_row->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand')
					                <span class="invalid-feedback" role="alert">
					                	<strong>{{ $message }}</strong>
					                </span>
					            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategory_id" class="col-sm-2 col-form-label"> Subcategory </label>
                            <div class="col-sm-10">
                                <select class="custom-select  @error('subcategory') is-invalid @enderror" id="subcategory_id" name="subcategory">
                                    <option selected hidden value="">Choose Subcategory</option>
                                    @foreach($subcategories as $s_row)
                                    	<option value={{$s_row->id}}>{{$s_row->name}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory')
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