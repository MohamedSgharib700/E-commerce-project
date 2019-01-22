<div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
    {!! Form::label('name_ar', 'Name Ar') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
</div>
<div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
    {!! Form::label('name_en', 'Name En') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name_en') }}</small>
</div>
<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'Type') !!}
    {!! Form::select('type', array('1' => 'Dropdown List', '2' => 'Price Range', '3' => 'Lables', '4' => 'Arranging'),null,['class'=>'form-control']) !!}
    <small class="text-danger">{{ $errors->first('type') }}</small>
</div>
<div class="form-group{{ $errors->has('value_ar_start') ? ' has-error' : '' }}">
    {!! Form::label('value_ar_start', 'First Val') !!}
    {!! Form::text('value_ar_start', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('value_ar_start') }}</small>
</div>
<div class="form-group{{ $errors->has('value_en_end') ? ' has-error' : '' }}">
    {!! Form::label('value_en_end', 'Second Val') !!}
    {!! Form::text('value_en_end', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('value_en_end') }}</small>
</div>

{!!Form::submit('save', ['class'=>'btn btn-success'])!!}


@section('inlineJS')
<script type="text/javascript">
	

</script>
@endsection