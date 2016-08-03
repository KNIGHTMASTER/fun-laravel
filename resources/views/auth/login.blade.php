@extends('auth.login-template.template-login')
@section('login-content')
    <div class="login-logo">
        <a href="{{URL::to('/auth/login')}}">Fun Laravel</a>
    </div>
    @include('scaffold.validation.alert-error-layout')
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {!! FORM::open(['url'=>'auth/login']) !!}
            <div class="form-group has-feedback">
                {!! FORM::text('user_code', null, ['class'=>'form-control login-email', 'placeholder'=>'Email or user name']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!!FORM::password('password', ['class'=>'form-control login-password', 'placeholder'=>'Password']) !!}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <button class="btn btn-primary btn-block btn-flat" type="submit">Sign In</button>
            </div>
        {!! FORM::close() !!}

        @include('auth.login-template.social-signin')
        @include('auth.login-template.forgot-register')
    </div>
@endsection

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
