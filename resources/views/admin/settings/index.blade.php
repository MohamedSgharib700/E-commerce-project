@extends('layouts.admin.main')
@section('title','Site Settings')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">@yield('title')</div>
	<div class="panel-body">
		@if($settings == null)
			{!!Form::open(['action'=>'Admin\SiteSettingsController@store','novalidate'])!!}
		@else
			{!!Form::model($settings,['action'=>['Admin\SiteSettingsController@update',$settings],'method'=>'PATCH','novalidate'])!!}
		@endif
			
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#settings_ar" aria-controls="settings_ar" role="tab" data-toggle="tab"> <i class="fa fa-gears"></i> Settings Ar</a>
					</li>
					<li role="presentation">
						<a href="#settings_en" aria-controls="settings_en" role="tab" data-toggle="tab"><i class="fa fa-gears"></i> Settings En</a>
					</li>
					<li role="presentation">
						<a href="#emails" aria-controls="emails" role="tab" data-toggle="tab"><i class="fa fa-envelope"></i> Emails and SMS</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
						
						<div role="tabpanel" class="tab-pane fade in active" id="settings_ar">
							
							<div class="form-group{{ $errors->has('site_name_ar') ? ' has-error' : '' }}">
							    {!! Form::label('site_name_ar', 'Site Name AR') !!}
							    {!! Form::text('site_name_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('site_name_ar') }}</small>
							</div>
							
							
							<div class="form-group{{ $errors->has('tags_ar') ? ' has-error' : '' }}">
							    {!! Form::label('tags_ar', 'Tags AR') !!}
							    {!! Form::text('tags_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('tags_ar') }}</small>
							</div>

							<div class="form-group{{ $errors->has('meta_description_ar') ? ' has-error' : '' }}">
							    {!! Form::label('meta_description_ar', 'Meta Description AR') !!}
							    {!! Form::textarea('meta_description_ar', null, ['rows'=>'3','class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('meta_description_ar') }}</small>
							</div>
							

						</div>

						<div role="tabpanel" class="tab-pane fade" id="settings_en">
							
							<div class="form-group{{ $errors->has('site_name_en') ? ' has-error' : '' }}">
							    {!! Form::label('site_name_en', 'Site Name EN') !!}
							    {!! Form::text('site_name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('site_name_en') }}</small>
							</div>

							<div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }}">
							    {!! Form::label('tags_en', 'Tags EN') !!}
							    {!! Form::text('tags_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('tags_en') }}</small>
							</div>


							<div class="form-group{{ $errors->has('meta_description_en') ? ' has-error' : '' }}">
							    {!! Form::label('meta_description_en', 'Meta Description EN') !!}
							    {!! Form::textarea('meta_description_en', null, ['rows'=>'3','class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('meta_description_en') }}</small>
							</div>
							

						</div>


						<div role="tabpanel" class="tab-pane fade" id="emails">
							<div class="form-group{{ $errors->has('default_sms_getway') ? ' has-error' : '' }}">
							    {!! Form::label('default_sms_getway', 'Default SMS Getway') !!}
							    {!! Form::select('default_sms_getway', $smsGetways, null, ['id' => 'default_sms_getway', 'class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('default_sms_getway') }}</small>
							</div>
							<div class="form-group{{ $errors->has('default_email') ? ' has-error' : '' }}">
							    {!! Form::label('default_email', 'Default E-Mail') !!}
							    {!! Form::select('default_email', $emails, null, ['id' => 'default_email', 'class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('default_email') }}</small>
							</div>
							<div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
							    {!! Form::label('contact_email', 'Contact E-mail') !!}
							    {!! Form::select('contact_email', $emails, null, ['id' => 'contact_email', 'class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('contact_email') }}</small>
							</div>
							<div class="form-group{{ $errors->has('subscription_mail') ? ' has-error' : '' }}">
							    {!! Form::label('subscription_mail', 'Subscription E-mail') !!}
							    {!! Form::select('subscription_mail', $emails, null, ['id' => 'subscription_mail', 'class' => 'form-control', 'required' => 'required']) !!}
							    <small class="text-danger">{{ $errors->first('subscription_mail') }}</small>
							</div>
						</div>

					    <div class="btn-group pull-right">
					        {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
					    </div>
						
				</div>
			</div>

		{!!Form::close()!!}
	</div>
</div>

@endsection