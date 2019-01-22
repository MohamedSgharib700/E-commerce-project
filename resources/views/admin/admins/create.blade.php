@extends('layouts.admin.main')
@section('title','Create Admin')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading text-center"> <strong>@yield('title')</strong></div>
		<div class="panel-body">
			{!! Form::open(['action' => 'AdminController@store']) !!}
			
				@include('admin.admins._form',['type'=>'admin'])

			    <div class="btn-group pull-right">
			        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
			    </div>
			
			{!! Form::close() !!}
		</div>
	</div>

@endsection