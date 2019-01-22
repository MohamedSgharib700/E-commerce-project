@extends('layouts.admin.main')
@section('title','User Subscriptions')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">{{$user->name}} Subscriptions</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Months</th>
					<th>Posts</th>
					<th>Start</th>
					<th>End</th>
				</thead>
				@foreach($user->getSubscriptions as $bill)
				<tr>
					<td>{{$bill->id}}</td>
					<td>{{$bill->months}}</td>
					<td>{{$bill->posts}}</td>
					<td>{{$bill->created_at->format('Y-m-d')}}</td>
					<td>{{$bill->created_at->addMonths($bill->months)->format('Y-m-d')}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection