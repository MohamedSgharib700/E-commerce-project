@extends('layouts.admin.main')
@section('title','User Subscriptions')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">{{$user->name}} Posts</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Posts</th>
					<th>Start</th>
					<th>End</th>
				</thead>
				@foreach($user->getPosts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>{{$post->name}}</td>
					<td>{{$post->posts}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection