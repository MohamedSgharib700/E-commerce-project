@extends('layouts.admin.main')
	@section('title',' Messages')
	@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading">	 Messages</div>
		<div class="panel-body">
			@if(count($conversations)>0)
			<br>
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Send From</th>
					<th>Send To</th>
					<th>Message</th>
					<th>Date</th>
					
				</thead>
				@foreach($conversations as $mes)
				<tr>
					<td>{{$mes->id}}</td>
					<td>{{$mes->user_one}}</td>
					<td>{{$mes->user_two}}</td>
					<td>{{$mes->latest()->get()}}</td>
					<td>{{$mes->messages->last()->created_at->format('Y-m-d H:i:s')}}</td>
					
				</tr>
				@endforeach
			</table>
			@endif
		</div>
	</div>
@stop
@section('inlineJS')
<script type="text/javascript">
	$('table').dataTable();
</script>
@endsection