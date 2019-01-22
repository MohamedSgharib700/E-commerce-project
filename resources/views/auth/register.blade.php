@extends('layouts.user')

@section('content')
<div class="big-head top-100 bottom-50 centerd">
            <h1>تسجيل عضوية جديدة</h1>
    </div>

      <!-- register -->
      <div class="big-container register bottom-100 centerd">

        <div class="boxed-container">

            <div class="row no-margin center-border bottom-50">
                <span class="has-or">أو</span>

                <div class="box-head">
                    <p>من خلال التسجيل في الموقع انا اوافق علي 
                        <a href="{{ route('conditions')}}" target="_blank">شروط الاستخدام</a>
                        و
                        <a href="{{ route('privacypolicy')}}" target="_blank">سياسة الخصوصية</a>
                        واوافق علي تلقي العروض من موقع قلف روتس
                    </p>
                </div>

                <div class="col l6">
                    <form class="normal-inputs form-80 top-25 bottom-25" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="اسم المستخدم">
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="هاتف المستخدم">
                        @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="البريد الاليكتروني">
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="كلمة المرور">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="إعادة كلمة المرور">
                        </div>
                        <div>
                        <input type="submit"  value="تسجيل الحساب">
                        </div>
                        <a href="{{route ('login')}}">هل لديك حساب مسجل؟</a>
                    </form>
                </div>
                
                <div class="col l6 centerd vcenter">

                    <a href="{{route('fbredirect')}}" class="zoom blocked"><img src="{{ asset('front-assets/images/facebook-reg.jpg')}}" alt=""></a>
                    <a href="{{route('gplusredirect')}}" class="zoom blocked"><img src="{{ asset('front-assets/images/google-reg.jpg')}}" alt=""></a>
                
                </div>

                <div class="clearfix"></div>
            </div>

        </div>

        

      </div>
@endsection
