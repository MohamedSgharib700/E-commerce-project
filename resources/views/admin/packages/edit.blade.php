@extends('layouts.admin.main')
@section('title','Packages Settings')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		{!!Form::model($package,['action'=>['PackagesController@update',$package->id],'method'=>'PATCH','novalidate'])!!}
			@include('admin.packages._form')
		{!!Form::close()!!}
	</div>
</div>

@endsection