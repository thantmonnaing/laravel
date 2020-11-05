@extends('frontendtemplate')

@section('content')

<div class="container">
	<div class="row mt-5 shoppingcart_div">	
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th colspan="2">Product</th>
						<th></th>
						<th></th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody id="tbody">

				</tbody>
				<tfoot id="tfoot">
					<tr>
						<td colspan="8">
							<h3 class="text-right mr-5" id="cart_total"></h3>
						</td>
					</tr>
					<tr class="mx-5"> 
						<td></td>
						<td colspan="5"> 
							<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
						</td>
						<td colspan="3">
							<button class="btn btn-success btn-block mainfullbtncolor checkoutbtn">
								Check Out 
							</button>
						</td>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>	
</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{asset('my_asset/js/cart.js')}}"></script>
@endsection