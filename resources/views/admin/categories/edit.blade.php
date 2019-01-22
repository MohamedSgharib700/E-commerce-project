@extends('layouts.admin.main')
@section('title','Categories Settings')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		{!!Form::model($category,['action'=>['Admin\CategoriesController@update',$category->id],'method'=>'PATCH','novalidate'])!!}
			@include('admin.categories._form')
		{!!Form::close()!!}
	</div>
</div>

@endsection