@extends('backendtemplate')
@section('item_active')
  active
@endsection
@section('content')
	<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Item Lists</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('item.create')}}" class="btn btn-primary">Add Item</a></li>
		</ul>
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                           	<tbody>
                           		@php 
                                $i = 1; 
                              @endphp
                           		@foreach($items as $row)
                           		<tr>
                           			<td> {{$i++}} </td>
                           			<td> {{$row->name}} </td>
                                <td>
                                  @foreach($brands as $b_row)
                                    @php
                                      if($b_row->id == $row->brand_id)
                                        echo "$b_row->name";
                                    @endphp
                                  @endforeach
                                 </td>
                                <td> 
                                  @php
                                    if( $row->discount > 0)
                                      echo "<span class='text-danger'> $row->discount Ks</span> <br><del>$row->price Ks</del>";
                                    else
                                      echo "<span class='text-danger'> $row->price Ks</span>";
                                    @endphp
                                </td>
                           			<td> 
                           				<a href="{{route('item.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                           				<a href="{{route('item.show',$row->id)}}" class="btn btn-info">Show</a> 
                                  <form method="post" action="{{route('item.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to Delete?')" class="d-inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">                                    
                                  </form>
                           			</td>
                           		</tr>
                           		@endforeach
                           	</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')

<script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$('#sampleTable').DataTable();
</script>

@endsection