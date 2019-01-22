@extends('layouts.admin.main')
	@section('title', 'categories')
	@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">@yield('title')</div>
		<div class="panel-body">
			@if(count($categories) > 0)
				{!!Form::open(['action'=>'Admin\CategoriesController@sortRows'])!!}
				<table class="table table-bordered">
					<thead>
						<th> #</th>
						<th> Name</th>
						<th> Slug</th>
						<th> sort</th>
						<th> option</th>
					</thead>

					<tbody>
						@foreach($categories as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td><a href="{{Url('/')}}/admin/categories/{{$category->id}}">{{$category->name}}</a></td>
								<td><a href="{{Url('/')}}/admin/categories/{{$category->id}}">{{$category->slug}}</a></td>
								<td>{!! Form::input('number','sort['.$category->id.']',$category->sort,['style'=>'width:50px'])!!}</td>
								<td><a href="{{Url('/')}}/admin/categories/{{$category->id}}/edit" class="btn btn-warning">edit</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
					{!!Form::submit('Sort',['class'=>'btn btn-success'])!!}
					{!!Form::close()!!}
			@else
				<div class="well text-center">no categories yet !</div>
			@endif
		</div>
	</div>
	@endsection
@section('inlineJS')
<script type="text/javascript">
	//$('table').dataTable();
</script>
@endsection