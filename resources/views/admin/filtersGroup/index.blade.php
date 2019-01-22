@extends('layouts.admin.main')
	@section('title', 'Filters Groups')
	@section('content')
	@if(Session::has('msg'))
		<div class="alert alert-success">{{Session::get('msg')}}</div>
	@endif
	<a href="{{Url('/')}}/admin/filter-groups/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading">@yield('title')</div>
		<div class="panel-body">
		@if(count($groups)>0)
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</thead>
				@foreach($groups as $package)
					<tr>
						<td>{{$package->id}}</td>
						<td>{{$package->group_name}}</td>
						<td><a href="{{Url('/')}}/admin/filter-groups/{{$package->id}}/edit" class="btn btn-warning">EDIT</a></td>
						<td>
							{!!Form::open(['method'=>'DELETE','action'=>['Admin\FiltersGroupsController@destroy',$package->id]])!!}
								<button class="btn btn-danger" onClick="return confirm('Are you sure to DELETE This record ?')">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</table>
			@else
				<div class="well">No groups yet !!</div>
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