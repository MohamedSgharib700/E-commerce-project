@extends('layouts.admin.main')
@section('title','Edit Posts')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">@yield('title')</div>
		<div class="panel-body">
			{!!Form::model($post,['action'=>['PostsController@update',$post->id],'method'=>'PATCH','novalidate'])!!}
			@include('admin.posts._form')
		{!!Form::close()!!}
		</div>
	</div>
@endsection