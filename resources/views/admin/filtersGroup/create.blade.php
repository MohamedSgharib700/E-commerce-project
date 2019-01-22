@extends('layouts.admin.main')
@section('title','Filters Groups')
@section('content')
@if(Session::has('error'))
	<div class="alert alert-danger">{{Session::get('error')}}</div>
@endif
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		{!!Form::open(['action'=>['Admin\FiltersGroupsController@store'],'novalidate'])!!}
			@include('admin.filtersGroup._form')		
				
		{!!Form::close()!!}
	</div>
</div>

@endsection