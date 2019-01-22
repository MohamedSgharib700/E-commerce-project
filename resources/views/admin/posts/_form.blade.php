			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			    {!! Form::label('name', 'Post Name') !!}
			    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required|alpha_num']) !!}
			    <small class="text-danger">{{ $errors->first('name') }}</small>
			</div>
			<div class="form-group{{ $errors->has('short_des') ? ' has-error' : '' }}">
			    {!! Form::label('short_des', 'Post short Description') !!}
			    {!! Form::text('short_des', null, ['class' => 'form-control', 'required' => 'required|text']) !!}
			    <small class="text-danger">{{ $errors->first('short_des') }}</small>
			</div>
			<div class="form-group{{ $errors->has('long_des') ? ' has-error' : '' }}">
			    {!! Form::label('long_des', 'Post long Description') !!}
			    {!! Form::text('long_des', null, ['class' => 'form-control', 'required' => '']) !!}
			    <small class="text-danger">{{ $errors->first('long_des') }}</small>
			</div>
			<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
			    {!! Form::label('price', 'Price') !!}
			    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required|numrical']) !!}
			    <small class="text-danger">{{ $errors->first('price') }}</small>
			</div>

			<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
			    {!! Form::label('user_id', 'User_id') !!}
			    {!! Form::select('user_id',$user, null, ['id'=> 'user_subscriptions', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('user_id') }}</small>
			</div>
			<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
			    {!! Form::label('category_id', 'category_id') !!}
			    {!! Form::select('category_id',$category, null, ['id'=> 'categories', 'class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('category_id') }}</small>
			</div>
			<div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
			    {!! Form::label('sub_category_id', 'sub_category_id') !!}
			    {!! Form::select('sub_category_id',$subcategory, null, ['id'=> 'categories', 'class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('sub_category_id') }}</small>
			</div>
			<!-- <div class="form-group{{ $errors->has('photos') ? ' has-error' : '' }}">
			    {!! Form::label('photos', 'Photos') !!}</br>
			    {!! Form::file('photos', null, ['class' => 'form-control']) !!}</br></br>
			    {!! Form::submit('upload')!!}
			    <form enctype="multipart/form-data" action="" method="POST">
			    Select images:
			    <input type='file' name="file[]" onchange="readURL(this);" multiple><br><br>
				<img id="blah" src="http://placehold.it/180" alt="your image" height="250" width="250" />

			    </form>

				<script type="text/javascript">
					function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
				</script>
			    <small class="text-danger">{{ $errors->first('photos') }}</small>
			</div> -->


{!!Form::submit('Create', ['class'=>'btn btn-success'])!!}



@section('inlineJS')
<script type="text/javascript">


</script>
@endsection
