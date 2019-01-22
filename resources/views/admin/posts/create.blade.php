@extends('layouts.admin.main')
@section('title','Posts')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		{!!Form::open(['action'=>['PostsController@store'],'novalidate'])!!}
			@include('admin.posts._form')	
		{!!Form::close()!!}
	</div>
</div>
@endsection