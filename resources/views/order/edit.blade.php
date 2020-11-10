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

					<form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group row">
 							<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
 							<div class="col-sm-10">
 								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name_id" name="name" value="{{$item->name}}">
 								<input type="hidden" name="codeno" value="{{$item->codeno}}">
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
										<img src="{{asset($item->photo)}}" width="100px" height="100px" id="add_image" class="img-fluid">
										<input type="hidden" name="oldphoto" value="{{$item->photo}}">
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
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price_id" name="price" value="{{$item->price}}">
                                        @error('price')
							                <span class="invalid-feedback" role="alert">
							                	<strong>{{ $message }}</strong>
							                </span>
							            @enderror
                                    </div>
                                    <div class="tab-pane fade" id="discount" role="tab-panel" aria-labelledby="discount_tab">
                                        <input type="number" class="form-control" id="discount_id" name="discount" value="{{$item->discount}}">
                                    </div>
                                </div>
                            </div>
 						</div>						

 						<div class="form-group row">
 							<label for="desc_id" class="col-sm-2 col-form-label"> Description </label>
 							<div class="col-sm-10">
 								<textarea id="desc_id" name="description" class="form-control @error('description') is-invalid @enderror" rows="2">{{$item->description}}</textarea>
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
                                <select class="custom-select @error('brand') is-invalid @enderror" id="brand_id" name="brand">
                                    @foreach($brands as $b_row)
                                    	<option value={{$b_row->id}} 
                                    		@if($b_row->id == $item->brand_id) 
                                    			{{'selected'}}
                                    		@endif>{{$b_row->name}}</option>
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
                            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
                            <div class="col-sm-10">
                                <select class="custom-select category @error('category') is-invalid @enderror" id="category_id" name="category">
                                    @foreach($categories as $c_row)
                                    	<option value={{$c_row->id}} 
                                    		@if($c_row->id == $item->subcategory->category_id) 
                                    			{{'selected'}}
                                    		@endif>{{$c_row->name}}</option>
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
                            <label for="subcategory_id" class="col-sm-2 col-form-label"> Subcategory </label>
                            <div class="col-sm-10">
                                <select class="custom-select subcategory @error('subcategory') is-invalid @enderror" id="subcategory_id" name="subcategory">
                                    @foreach($subcategories as $s_row)
                                    	<option value={{$s_row->id}} 
                                    		@if($s_row->id == $item->subcategory_id) 
                                    			{{'selected'}}
                                    		@endif>{{$s_row->name}}</option>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.category').change(function(){
                let categoryid = $(this).val();
                // alert(categoryid);
                var html="";
                $.post("{{route('filterCategory')}}", {cid:categoryid}, function(response){
                    console.log(response);
                    for(let row of response){
                        html+=`
                        <option value=${row.id}>${row.name}</option>
                        `;
                    }
                    $('.subcategory').html(html);
                })
            })        
        })  
    </script>    
@endsection