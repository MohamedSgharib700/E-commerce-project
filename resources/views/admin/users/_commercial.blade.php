<div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
    {!! Form::label('contact_number', 'Contact Number') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('contact_number') }}</small>
</div>
<div class="form-group{{ $errors->has('whatsapp_number') ? ' has-error' : '' }}">
    {!! Form::label('whatsapp_number', 'Whatsapp Number') !!}
    {!! Form::text('whatsapp_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('whatsapp_number') }}</small>
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('address') }}</small>
</div>

<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
    {!! Form::label('logo', 'Logo') !!}
    <div class="row col-md-12">
   		<div class="col-md-3 thumbnail">
    		<img src="sdfd">
   		</div>	
    </div>	
    {!! Form::file('logo', ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('logo') }}</small>
</div>
<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
    {!! Form::label('phone_number', 'Phone Number') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('phone_number') }}</small>
</div>
<div class="form-group{{ $errors->has('commercial_record_number') ? ' has-error' : '' }}">
    {!! Form::label('commercial_record_number', 'Commercial Record Number') !!}
    {!! Form::text('commercial_record_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('commercial_record_number') }}</small>
</div>
<div class="form-group{{ $errors->has('commercial_record_file') ? ' has-error' : '' }}">
    {!! Form::label('commercial_record_file', 'Commercial Record File') !!}
    {!! Form::file('commercial_record_file', ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('commercial_record_file') }}</small>
</div>
<div class="form-group{{ $errors->has('maaroof_url') ? ' has-error' : '' }}">
    {!! Form::label('maaroof_url', 'Maaroof Url') !!}
    {!! Form::text('maaroof_url', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('maaroof_url') }}</small>
</div>
