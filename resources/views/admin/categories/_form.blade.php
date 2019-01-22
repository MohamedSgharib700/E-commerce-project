<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#settings_ar" aria-controls="settings_ar" role="tab" data-toggle="tab"> <i class="fa fa-gears"></i> Category Ar</a>
		</li>
		<li role="presentation">
			<a href="#settings_en" aria-controls="settings_en" role="tab" data-toggle="tab"><i class="fa fa-gears"></i> Category En</a>
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">	
		<div role="tabpanel" class="tab-pane fade in active" id="settings_ar">
			
			<div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
			    {!! Form::label('name_ar', 'Category Name AR') !!}
			    {!! Form::text('name_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
			</div>					

		</div>

		<div role="tabpanel" class="tab-pane fade" id="settings_en">
			
			<div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
			    {!! Form::label('name_en', 'Category Name EN') !!}
			    {!! Form::text('name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('name_en') }}</small>
			</div>
		</div>
	</div> 
	{!!Form::submit('save', ['class'=>'btn btn-success'])!!}
</div>			