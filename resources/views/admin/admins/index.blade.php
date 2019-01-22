@extends('layouts.admin.main')
@section('title','Admins')

@section('content')
	<a href="{{Url('/')}}/admin/admins/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading text-center"> <strong>@yield('title')</strong></div>
		<div class="panel-body">
			@if(count($admins)>0)
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Group</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</thead>
				@foreach($admins as $admin)
					<tr>
						<td>{{$admin->id}}</td>
						<td>{{$admin->name}}</td>
						<td>{{$admin->group->name}}</td>
						<td><a href="{{Url('/')}}/admin/admins/{{$admin->id}}/edit" class="btn btn-warning">EDIT</a></td>
						<td>
							{!!Form::open(['method'=>'DELETE','action'=>['AdminController@destroy',$admin->id]])!!}
								<button class="btn btn-danger" onClick="return confirm('Are you sure to DELETE This record ?')">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</table>
			@else
				<div class="well">No admins yet !!</div>
			@endif
		</div>
	</div>
@endsection
@section('inlineJS')
<script type="text/javascript">
	$('table').dataTable();
</script>
@endsection