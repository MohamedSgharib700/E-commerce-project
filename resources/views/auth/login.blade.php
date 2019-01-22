@extends('layouts.user')

@section('content')
<div class="big-head top-100 bottom-50 centerd">
            <h1>تسجيل الدخول</h1>
    </div>

      <!-- register -->
      <div class="big-container register bottom-100 centerd">
        <div class="boxed-container">
            <div class="row no-margin center-border top-50 bottom-50">
                <span class="has-or">أو</span>
                <div class="col l6">
                    <form class="normal-inputs form-80 top-25 bottom-25" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input id="email" placeholder="البريد الاليكتروني" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" placeholder="كلمة المرور" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="checkbox width-50 inlined mb-15 login">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span></span>
                            تذكرني
                        </label>
                        <div class="width-50 lefted inlined mb-15">
                            <a class="thin" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                        </div>
                        <input type="submit" value="تسجيل الدخول">
                        <a href="{{route('register')}}">ليس لديك حساب؟</a>
                    </form>
                </div>
                <div class="col l6 centerd vcenter2">
                    <a href="{{route('fbredirect')}}" class="zoom blocked"><img src="{{ asset('images/facebook-log.jpg') }}" alt=""></a>
                    <a href="{{route('gplusredirect')}}" class="zoom blocked"><img src="{{ asset('images/google-log.jpg')}}" alt=""></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
@endsection
