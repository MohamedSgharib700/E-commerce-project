@extends('layouts.admin.main')

@section('title','Create Group')
@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading text-center"><strong>@yield('title')</strong></div>	
		<div class="panel-body">	
			{!! Form::open([ 'action' => 'AdminGroupsController@store']) !!}
				@include('admin.groups._form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection