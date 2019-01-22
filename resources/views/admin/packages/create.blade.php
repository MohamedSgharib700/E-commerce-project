@extends('layouts.admin.main')
@section('title','Packages Settings')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		{!!Form::open(['action'=>['PackagesController@store'],'novalidate'])!!}
			@include('admin.packages._form')		
				
		{!!Form::close()!!}
	</div>
</div>

@endsection