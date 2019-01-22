@extends('layouts.admin.main')
@section('title','User Bills')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">{{$user->name}} Bills</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Amount</th>
					<th>Status</th>
					<th>Date</th>
				</thead>
				@foreach($user->getBills as $bill)
				<tr>
					<td>{{$bill->id}}</td>
					<td>{{$bill->amount}}</td>
					<td>
						@if($bill->status == 0)
						{!! Form::open(['method' => 'POST','action' =>['UsersController@payBill',$bill->id], 'class' => 'form-horizontal']) !!}
							<button class="btn btn-success">{{$status[$bill->status]}}</button>
						{!! Form::close() !!}
						
						@elseif($bill->status == 1)
						<a class="btn btn-default disabled">{{$status[$bill->status]}}</a>
						@endif
					</td>
					<td>{{$bill->created_at->format('Y-m-d')}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection