@extends('layouts.admin.main')

@section('title','Create Group')
@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading text-center"><strong>@yield('title')</strong></div>	
		<div class="panel-body">	
			{!! Form::model($admin_group,[ 'action' => ['AdminGroupsController@update',$admin_group->id],'method'=>'PATCH']) !!}
				@include('admin.groups._form',['type'=>'edit'])
			{!! Form::close() !!}
		</div>
	</div>
@endsection