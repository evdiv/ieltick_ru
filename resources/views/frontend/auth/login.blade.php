@extends('frontend.layouts.tmpl')

@section('title', 'Войти в личный кабинет IELTick')
@section('meta_description', 'Войти в личный кабинет для подготовки к сдаче IELTS Speaking.')
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
                        <span>Войти</span>
                        <h2>Войти в личный кабинет</h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form method="POST" action="/login" class="form">
                        @csrf
                        
                        <div>
                            <input class="input-text required-field email-field" type="email" 
                                    name="email" 
                                    placeholder="Введите ваш email" 
                                    value="{{ old('email') }}" required autofocus/>


                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div>
                            <input class="input-text required-field" type="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="text-right">
                            <input class="color-two button" type="submit" value="Войти"/>
                        </div>
                    </form>

                    <div class="text-right">
                        <a href="/password/reset">Забыли пароль?</a> 
                    </div>

                </div>
            </div><!--/.row -->
        </div><!--/.container -->
    </div><!--/.wrap-inner-page -->

@endsection