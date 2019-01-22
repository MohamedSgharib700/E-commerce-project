@extends('layouts.admin.main')

@section('title','Admin Groups')
@section('content')
	<a href="{{Url('/')}}/admin/admin-groups/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading text-center"> <strong>@yield('title')</strong></div>
		<div class="panel-body">
			@if(count($groups) > 0)
				<table class="table table-bordered">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th colspan="2">Options</th>
					</thead>
					@foreach($groups as $group)
					<tr>
						<td>{{$group->id}}</td>
						<td>{{$group->name}}</td>
						<td><a href="{{Url('/')}}/admin/admin-groups/{{$group->id}}/edit" class="btn btn-warning">Edit</a></td>
						<td>
							{!!Form::open(['action'=>['AdminGroupsController@destroy',$group->id],'method'=>'DELETE'])!!}
								<button class="btn btn-danger" onCLick="return confirm('Are you sure to DELETE this Record ?')">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
					@endforeach
				</table>
				{!!$groups->render()!!}
			@else
				<div class="well">No Groups Yet !!</div>
			@endif
		</div>
	</div>
@endsection