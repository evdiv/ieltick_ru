@extends('layouts.app')

@section('title', 'Восстановление пароля на сервисе IELTick.')
@section('description', 'Эффективная и быстрая подготовка к сдаче IELTS Speaking.')
@section('keywords', 'ielts speaking подготовка, ielts онлайн пробный, онлайн подготовка ielts, обучение ielts speaking')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Введите вашу почту</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Ссылка для генерации пароля отправлена на вашу почту
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
