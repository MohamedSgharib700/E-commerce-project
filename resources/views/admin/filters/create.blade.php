@extends('layouts.admin.main')
@section('title','Filters Settings')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		{!!Form::open(['action'=>['Admin\FiltersController@store'],'novalidate'])!!}
			@include('admin.filters._form')
		{!!Form::close()!!}
	</div>
</div>

@endsection