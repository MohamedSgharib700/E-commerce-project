@extends('layouts.admin.main')
@section('title','Edit Admin')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading text-center"> <strong>@yield('title')</strong></div>
		<div class="panel-body">
			{!! Form::model($admin,['method'=>'PATCH','route' => ['admins.update',$admin->id] ]) !!}
			
				@include('admin.admins._form',['type'=>'edit'])
				
			    <div class="btn-group pull-right">
			        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
			    </div>
			
			{!! Form::close() !!}
		</div>
	</div>

@endsection