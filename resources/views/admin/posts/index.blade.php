@extends('layouts.admin.main')
	@section('title', 'Posts')
	@section('content')
	<a href="{{Url('/')}}/admin/posts/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading">@yield('title')</div>
		<div class="panel-body">
		@if(count($posts)>0)
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>User Id</th>
					<th>Category Id</th>
					<th>SubCategory Id</th>
					<th>Name</th>
					<th>Short Description</th>
					<th>Long Descripition</th>
					<th>Price</th>
					<th>Photos</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				@foreach($posts as $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>{{$post->user->user_id}}</td>
						<td>{{$post->category->name}}</td>
						<td>{{$post->category->sub_id}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->short_des}}</td>
						<td>{{$post->long_des}}</td>
						<td>{{$post->price}}</td>
						<td>{{$post->photos}}</td>
						<td><a href="{{Url('/')}}/admin/posts/{{$post->id}}/edit" class="btn btn-warning">EDIT</a></td>
						<td>
							{!!Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]])!!}
								<button class="btn btn-danger" onClick="return confirm('Are you sure to DELETE This record ?')">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</table>
			@else
				<div class="well">No filters yet !!</div>
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