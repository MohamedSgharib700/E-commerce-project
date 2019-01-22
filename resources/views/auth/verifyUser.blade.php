@extends('layouts.app')

@section('title')
    Verify
@endsection

@section('content')
    <div class="big-head top-100 bottom-50 centerd">
        <h1>تأكيد الحساب</h1>
    </div>
    <!-- register -->
    <div class="big-container register bottom-100 centerd">
        <div class="boxed-container">
            <div class="row no-margin top-50 bottom-50">
                <div class="thanks-box">
                    من فضلك ادخل كود التأكيد الذي تم ارساله علي هاتفك الجوال لتأكيد بياناتك
                    <div class="tiny-form">
                        <form method="POST" action="{{route('user-verify')}}">
                            {{ csrf_field() }}
                            {{--{!! Form::open(['url' => route('user-verify')]) !!}--}}
                            <input type="text" name="token" placeholder="كود التأكيد">
                            <div class="row no-margin">
                                <div class="col l6 rightness bolded">
{{--                                    {!! Form::open(['url' => route('user-verify-resend')]) !!}--}}
                                    <a href="{{route('user-verify-resend')}}" type="submit" class="ln-45 opa">ارسال الكود مره اخري؟</a>
                                    {{--{!! Form::close() !!}--}}
                                </div>
                                <div class="col l6">
                                    <input class="blue rudis ln-45 bolded no-border full-width opa" type="submit" value="تأكيد">
                                </div>
                                {{--{!! Form::close() !!}--}}
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--     {!! Form::open(['url' => route('user-verify')]) !!}
            <div class="form-group">
{!! Form::label('token') !!}
    {!! Form::text('token', '', ['class' => 'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary">Verify Token</button>
{!! Form::close() !!} -->
    <!--
    <hr>
    {!! Form::open(['url' => route('user-verify-resend')]) !!}
            <button type="submit" class="btn">Resend code</button>
{!! Form::close() !!} -->
@endsection
