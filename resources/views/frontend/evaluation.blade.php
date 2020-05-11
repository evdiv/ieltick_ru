@extends('frontend.layouts.dashboard')

@section('title', 'Экзамены для самостоятельной подготовки к IELTS Speaking.')

@section('header')
    @include('frontend.includes.dashboard-header')
@endsection


@section('content')

    <!-- courses area start -->
    <div class="wrap-bg wrap-bg-dark wrap-inner-page">
        <div class="container">


            @if(count($errors->all()) > 0)
               <div class="row justify-content-center">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="alert alert-danger">
                            <h4 class="text-center">{{ $errors->first() }}</h4>
                            <p class="text-center"><a href='/subscriptions'>Вернуться к выбору экзаменов</a></p>
                        </div>
                    </div>
                </div>
            @endif

            @guest
                @include('frontend.auth.register')
            @else

                <div class="row justify-content-center text-center">
                    <div class="col-lg-12">
                        <div class="section-title with-p">
                            <span>Evaluation</span>
                          <h2>Вы успешно прошли экзамен!</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title with-p">
                            Additional notes related to the exam
                        </div>
                    </div>
                </div>

            @endguest

        </div><!--/ .container-->
    </div>

@endsection