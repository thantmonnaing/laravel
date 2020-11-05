@extends('frontendtemplate')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="tile-body">

						<div class="row m-5">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
								<img src="{{asset($item->photo)}}" class="img-fluid">
							</div>	

							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4> {{$item->name}} </h4>
									</div>
					             	<div class="card-body">
						                <p> {{$item->codeno}}</p>

										<p> {{$item->brand->name}}</p>

										<p> {{$item->subcategory->name}}</p>

										<p> {{$item->description}} </p>

										<p> 
											@if( $item->discount > 0)
												<span class='text-danger'> {{$item->discount}} MMK</span> <br><del>{{$item->price}} Ks</del>
											@else
												<span class='text-danger'>{{$item->price}} MMK</span>
											@endif			

										</p>
					                
					                	<input type="number" name="qty" class="form-control qty w-50" min="1" value="1">
					              	</div>
						            <div class="card-footer">
						            	<button class="btn btn-success add_to_card" data-id="{{$item->id}}" data-codeno ="{{$item->codeno}}" 							data-photo="{{$item->photo}}" data-name="{{$item->name}} " data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add to Cart</button>
						            </div>
					            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('my_asset/js/cart.js')}}"></script>
@endsection