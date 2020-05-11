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
                        <h2>Укажите почту для восстановления пароля</h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(['route' => 'frontend.auth.password.email', 'class' => 'form-horizontal']) }}

                    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'Укажите E-Mail для восстановления пароля']) }}

                    {{ Form::submit('Отправить ссылку', ['class' => 'color-two button']) }}

                    {{ Form::close() }}

                </div><!--/.col-md-6 -->

            </div><!--/.row -->

        </div><!--/.container -->

    </div><!--/.wrap-inner-page -->
@endsection