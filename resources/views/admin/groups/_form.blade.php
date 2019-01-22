<?php 

function hasPremession($pre)
{
    if($type == 'edit')
    {
        if(in_array($premessions,$pre)){
            return 'true';
        }
        return 'false';
    }

}

?>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Group Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>


<div class="form-group{{ $errors->has('premissions') ? ' has-error' : '' }}">
    {!! Form::label('premissions', 'Group premissions') !!}
    <div class="row">
    	
    	<div class="col-md-3">
    		<div class="form-group">
    		    <div class="checkbox{{ $errors->has('adminGroups') ? ' has-error' : '' }}">
    		        <label for="adminGroups">
    		            {!! Form::checkbox('premession[]', 'adminGroups', @hasPremession('adminGroups'), ['id' => 'adminGroups']) !!} Admin Groups
    		        </label>
    		    </div>
    		    <small class="text-danger">{{ $errors->first('adminGroups') }}</small>
    		</div>
    	</div>

    	<div class="col-md-3">
    		<div class="form-group">
    		    <div class="checkbox{{ $errors->has('admins') ? ' has-error' : '' }}">
    		        <label for="admins">
    		            {!! Form::checkbox('premession[]', 'admins', @hasPremession('admins'), ['id' => 'admins']) !!} Admins
    		        </label>
    		    </div>
    		    <small class="text-danger">{{ $errors->first('admins') }}</small>
    		</div>
    	</div>


    	<div class="col-md-3">
    		<div class="form-group">
    		    <div class="checkbox{{ $errors->has('users') ? ' has-error' : '' }}">
    		        <label for="users">
    		            {!! Form::checkbox('premession[]', 'users', @hasPremession('adminGroups'), ['id' => 'users']) !!} Users
    		        </label>
    		    </div>
    		    <small class="text-danger">{{ $errors->first('users') }}</small>
    		</div>
    	</div>


    </div>
</div>

<div class="btn-group pull-right">
    {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
</div>