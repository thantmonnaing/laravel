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

						<form method="" action="" class="checkoutform">
							@csrf
							<td></td>
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..." required></textarea>
								<input type="hidden" name="order" value="" id="ls">
							</td>
							<td colspan="3">
								@role('customer')
								<button class="btn btn-success btn-block checkoutbtn" type="submit">
									Check Out 
								</button>
								@else
								<a class="btn btn-success btn-block mainfullbtncolor" href="{{route('signin')}}">
									Sign in Check Out 
								</a>
								@endrole
							</td>
							<td></td>
						</form>
						
					</tr>
				</tfoot>
			</table>
		</div>
	</div>	
</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{asset('my_asset/js/cart.js')}}"></script>
	<script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $(document).ready(function () {
        // Usin Ajax
        $('.checkoutform').submit(function(e){
          let notes = $('#notes').val();
          if (notes === "") {
            return true;
          }else{
            let order = localStorage.getItem('items'); // JSON String
            $.post("{{route('order.store')}}",{order:order,notes:notes},function (response) {
              localStorage.clear();
              location.href="/ordersuccess";
            })
            e.preventDefault();
          }
        })
        // Using Form
        $('#ls').val(localStorage.getItem('items'));
      })
    </script>
@endsection