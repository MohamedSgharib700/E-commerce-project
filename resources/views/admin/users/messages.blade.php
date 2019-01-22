@extends('layouts.admin.main')
	@section('title',' Messages')
	@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading">{{$user->name}} Messages</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Send to</th>
					<th>Message</th>
					<th>Date</th>
					<th>Control</th>
				</thead>
				@foreach($user->getConversation as $mes)
				<tr>
					<td>{{$mes->id}}</td>
					<td>{{$mes->user_two}}</td>
					<td>{{$mes->user_one}}</td>
					<td width="16%">
							{!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy',$user->id]]) !!}
									<a href="">Edit</a>
							        {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection