@extends('layouts.admin.main')

	@section('title','Edit User')
	@section('content')
		<div class="panel panel-default">
			<div class="panel-heading">@yield('title')</div>
			<div class="panel-body">
				{!! Form::model($user,['action' => ['UsersController@update', $user['id']], 'method' => 'PATCH']) !!}
					@include('admin.users._form')
					@if($user['isCommercial'])
						@include('admin.users._commercial')
					@endif
					<div class="btn-group pull-right">
						{!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
					</div>
				
				{!! Form::close() !!}
			</div>
		</div>
	@endsection