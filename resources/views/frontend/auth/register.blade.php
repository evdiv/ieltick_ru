@extends('frontend.layouts.tmpl')

@section('title', 'Зарегистрируйтесь для самостоятельной подготовки к IELTS Speaking.')
@section('meta_description', 'Зарегистрируйтесь для эффективной и быстрой подготовки к сдаче IELTS Speaking.')
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
                        <span>Регистрация в системе</span>
                        @if(!empty($subscription))
                            <h3>Для оформления заказа пожалуйста укажите ваши контактные данные</h3>
                        @else
                            <h3>Для прохождения пробных экзаменов пожалуйста зарегистрируйтесь</h3>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-6 col-lg-6">

                    @include('frontend.layouts.errors')

                    <form method="POST" action="/register" class="form">
                        @csrf
                        
                        @if(!empty($subscription))
                            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                        @endif


                        <div>
                            <input type="text" class="form-control-hp" name="userName" value="">
                            <input type="text" class="input-text required-field text-field" 
                                    name="first_name" 
                                    placeholder="Введите ваше имя" 
                                    value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div>
                            <input class="input-text required-field email-field" type="email" 
                                    name="email" 
                                    placeholder="Введите ваш E-Mail" 
                                    value="{{ old('email') }}" required autofocus/>


                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div>
                            <input class="input-text required-field" id="password"
                                    type="password" 
                                    placeholder="Ваш пароль" 
                                    name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div>

                            <input class="input-text required-field" id="password-confirm" 
                                    type="password" 
                                    placeholder="Подтвердите пароль" 
                                    name="password_confirmation" required>
                        </div>

                        <div class="text-right">
                            <input class="color-two button" type="submit" value="Зарегистрироваться"/>
                        </div>
                    </form>

                </div><!--/.col-md-10 -->

            </div><!--/.row -->

        </div><!--/.container -->

    </div><!--/.wrap-inner-page -->
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            // To Use Select2
            Backend.Select2.init();
        });
    </script>
@endsection
