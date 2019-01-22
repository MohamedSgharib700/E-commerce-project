@extends('layouts.admin.main')
	@section('title', 'packages')
	@section('content')
	<a href="{{Url('/')}}/admin/packages/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading">@yield('title')</div>
		<div class="panel-body">
		@if(count($packages)>0)
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Name Ar</th>
					<th>Name En</th>
					<th>Desription Ar</th>
					<th>Desription En</th>
					<th>Features Ar</th>
					<th>Price</th>
					<th>isBestValue</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</thead>
				@foreach($packages as $package)
					<tr>
						<td>{{$package->id}}</td>
						<td>{{$package->name_ar}}</td>
						<td>{{$package->name_en}}</td>
						<td>{{$package->description}}</td>
						<td>{{$package->features}}</td>
						<td>{{$package->price}}</td>
						<td>{{$package->isBestValue}}</td>
						<td><a href="{{Url('/')}}/admin/packages/{{$package->id}}/edit" class="btn btn-warning">EDIT</a></td>
						<td>
							{!!Form::open(['method'=>'DELETE','action'=>['PackagesController@destroy',$package->id]])!!}
								<button class="btn btn-danger" onClick="return confirm('Are you sure to DELETE This record ?')">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</table>
			@else
				<div class="well">No packages yet !!</div>
			@endif
		</div>
		</div>
	</div>
@stop
@section('inlineJS')
<script type="text/javascript">
	$('table').dataTable();
</script>
@endsection