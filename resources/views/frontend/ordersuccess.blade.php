@extends('frontendtemplate')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="tile-body">

						<div class="container my-5">

							<div class="row justify-content-center">
								<div class="col-10 shadow p-3 mb-5 bg-white rounded">
									<div class="row">
										<div class="col-4">
											<img src="{{asset('my_asset/images/success-tick-dribbble.gif')}}" class="img-fluid">
										</div>
										<div class="col-8 pt-5">
											<h1> Your order is complete </h1>
											<p> You order will be delivered in 4 days. </p>
										</div>
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