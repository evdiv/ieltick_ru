@extends('frontend.layouts.tmpl')

@section('title', 'Восстановление пароля на сервисе IELTick.')
@section('meta_description', 'Эффективная и быстрая подготовка к сдаче IELTS Speaking.')
@section('meta_keywords', 'ielts speaking подготовка, ielts онлайн пробный, онлайн подготовка ielts, обучение ielts speaking')


@section('header')
    @include('frontend.includes.inner-header')
@endsection

@section('content')

    <!-- contact area start -->
    <div class="wrap-bg wrap-bg-dark wrap-inner-page">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="section-title with-p">
                        <span>Забыли пароль?</span>
                        <h2>Восстановление пароля</h2> 
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                           
                            <div class="col-md-6">
                                <p class="form-control-static">E-Mail: <b>{{ $email }}</b></p>
                                {{ Form::input('hidden', 'email', $email, ['class' => 'form-control', 'placeholder' => 'Ваш E-mail']) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', 'Пароль', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Новый пароль']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Подтверждение пароля', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Новый пароль']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Сбросить пароль', ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection
