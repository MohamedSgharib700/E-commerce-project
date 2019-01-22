@extends('layouts.user')
@section('content') 
<div class="big-head top-100 bottom-50 centerd">
        <h1>استرجاع كلمة المرور</h1>
</div>
      <!-- register -->
      <div class="big-container register bottom-100 centerd">
        <div class="boxed-container">
            <div class="row no-margin top-50 bottom-50">
                <div class="thanks-box">
                   من فضلك ادخل البريد الاليكتروني المسجل بالحساب الخاص بك
                   <div class="tiny-form xx">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       <form class="" role="form" method="POST" action="{{ route('password.email') }}">
                          {{ csrf_field() }}
                            <div class="row no-margin">
                                <div class="col l9 rightness" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" placeholder="البريد الاليكتروني" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col l3">
                                    <input class="blue rudis ln-45 bolded no-border full-width opa" type="submit" value="ارسال">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                       </form>
                   </div>
                    <a href="{{route ('landing')}}" class="butn blue">عودة للصفحة الرئيسية</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
@endsection