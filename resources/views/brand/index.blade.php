@extends('backendtemplate')
@section('content')
	<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> Brand Lists</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('brand.create')}}" class="btn btn-primary">Add Brand</a></li>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                           	<tbody>
                           		@php 
                                $i = 1; 
                              @endphp
                           		@foreach($brands as $row)
                           		<tr>
                           			<td> {{$i++}} </td>
                           			<td> {{$row->name}} </td>
                           			<td> 
                           				<a href="{{route('brand.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                           				<a href="{{route('brand.show',$row->id)}}" class="btn btn-info">Show</a> 
                                  <form method="post" action="{{route('brand.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to Delete?')" class="d-inline-block">
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