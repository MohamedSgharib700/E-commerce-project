@extends('layouts.admin.main')
@section('title', $category->name)
@section('content')
	<a href="{{Url('/')}}/admin/categories/{{$category->id}}/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>	 <br><br>
	@if(count($category->getSubCategories) > 0)
	<div class="panel panel-default">
		<div class="panel-heading">Sub Categories of @yield('title')</div><br>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<th> #</th>
						<th> Sub-Category Name</th>
						<th> Category Name</th>
						<th> Edit</th>
						<th> Delete</th>
					</thead>

					<tbody>
						@foreach($category->getSubCategories as $SubCategory)
							<tr>
								<td>{{$SubCategory->id}}</td>
								<td><a href="{{Url('/')}}/admin/categories/{{$SubCategory->id}}">{{$SubCategory->name}}</a></td>
								<td><a href="{{Url('/')}}/admin/categories/{{$category->id}}">{{$category->name}}</a></td>
								
								<td><a href="{{Url('/')}}/admin/categories/{{$SubCategory->id}}/edit" class="btn btn-warning">edit</a></td>
								<td>
								{!!Form::open(['method'=>'DELETE','action'=>['CategoriesController@destroy',$SubCategory->id]])!!}
									<button class="btn btn-danger" onClick="return confirm('Are you sure to DELETE This SubCategory ?')">DELETE</button>
								</td>
								{!!Form::close() !!}
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@else
		<div class="well text-center">no sub categories yet !</div>
	@endif
@stop

