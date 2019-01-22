<div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
    {!! Form::label('group_name', 'Group Name') !!}
    {!! Form::text('group_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('group_name') }}</small>
</div>

<div class="form-group">
    {!! Form::label('Filters') !!}
    <div class="row">
	    <div class="container">
		    @foreach($filters as $filter)
			    <div class="checkbox{{ $errors->has('$filter->id') ? ' has-error' : '' }}">
			        <label for="{{$filter->name}}">
			            {!! Form::checkbox('filters[]', $filter->id, null, ['id' => $filter->name]) !!} {{$filter->name}}
			        </label>
			    </div>
		    	<small class="text-danger">{{ $errors->first('filters[]') }}</small>
			@endforeach
	    </div>
    </div>
</div>

{!!Form::submit('save', ['class'=>'btn btn-success'])!!}