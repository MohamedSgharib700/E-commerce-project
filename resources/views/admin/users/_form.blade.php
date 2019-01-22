<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>