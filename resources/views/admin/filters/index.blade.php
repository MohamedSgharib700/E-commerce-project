@extends('layouts.admin.main')
	@section('title', 'filters')
	@section('content')
	<a href="{{Url('/')}}/admin/filters/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading">@yield('title')</div>
		<div class="panel-body">
		@if(count($filters)>0)
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Name Ar</th>
					<th>Name En</th>
					<th>Type</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</thead>
				@foreach($filters as $filter)
					<tr>
						<td>{{$filter->id}}</td>
						<td>{{$filter->name_ar}}</td>
						<td>{{$filter->name_en}}</td>
						@if($filter->type == '1')
							<td>{{'DropDown List'}}</td>
						@elseif($filter->type == '2')
							<td>{{'Price Range'}}</td>
						@elseif($filter->type == '3')
							<td>{{'Labels'}}</td>
						@elseif($filter->type == '4')
							<td>{{'Aranging'}}</td>
						@else
							<td></td>
						@endif
						<td><a href="{{Url('/')}}/admin/filters/{{$filter->id}}/edit" class="btn btn-warning">EDIT</a></td>
						<td>
							{!!Form::open(['method'=>'DELETE','action'=>['Admin\FiltersController@destroy',$filter->id]])!!}
								<button class="btn btn-danger" onClick="return confirm('Are you sure to DELETE This record ?')">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</table>
			@else
				<div class="well">No filters yet !!</div>
			@endif
		</div>
		</div>
	</div>
@stop
@section('inlineJS')
<script type="text/javascript">
	$('table').dataTable();
</script>
@endsection