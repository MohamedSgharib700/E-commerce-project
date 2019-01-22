
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			    {!! Form::label('name', 'Package Name ') !!}
			    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('name') }}</small>
			</div>
			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
			    {!! Form::label('description', 'Package Description ') !!}
			    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('description') }}</small>
			</div>
			<div class="form-group{{ $errors->has('features') ? ' has-error' : '' }}">
			    {!! Form::label('features', 'Packages Features ') !!}
			    {!! Form::text('features', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('features') }}</small>
			</div>


			<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
			    {!! Form::label('price', 'Package Price') !!}
			    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('price') }}</small>
			</div>
			<div class="form-group{{ $errors->has('isBestValue') ? ' has-error' : '' }}">
			    {!! Form::label('isBestValue', 'Package isBestValue') !!}
			    {!! Form::text('isBestValue', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('isBestValue') }}</small>
			</div>


	{!!Form::submit('save', ['class'=>'btn btn-success'])!!}
