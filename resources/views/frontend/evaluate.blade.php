@extends('frontend.layouts.tmpl')

@section('title', 'Пакеты из пробных экзаменов для самостоятельной подготовки к IELTS Speaking.')
@section('meta_description', 'Здесь вы можете выбрать подходящий для себя пакет из пробных экзаменов для эффективной подготовке к сдаче IELTS Speaking.')
@section('meta_keywords', 'ielts speaking подготовка, ielts онлайн пробный, онлайн подготовка ielts, обучение ielts speaking')

@section('header')
    @include('frontend.includes.inner-header')
@endsection

@section('before-scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
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
                        <p class="text-center"><a href='/lessons'>Вернуться</a></p>
                    </div>
                </div>
            </div>
        @endif


        @guest
            @include('auth.register')
        
        @else
            <div class="tbl-pricing">
                <div class="row">
                    <div class="col-xs-12 col-md-2"></div>

                    <div class="col-xs-12 col-sm-6 col-md-4 tbl-prc-coln d-none d-sm-block">
                        <div class="tbl-prc-wrap">

                            <div class="tbl-prc-heading">
                                <h4>Отправить на оценку</h4>
                            </div>

                            <div class="tbl-prc-price">
                                <h5>{{ env('EVALUATION_COST') }}<sup>.00</sup></h5>
                                <p>рублей</p> 
                            </div>

                            <div class="tbl-prc-description">
                                Ваши записи будут отправлены на оценку экзаменатору IELTS.
                                Оценка производится в течении 24 часов, после её окончания вам для скачивания будет доступен отчёт с указанием сильных и слабых сторон вашего спикинга.
                            </div>

                        </div>
                    </div><!--/.col -->


                    <div class="col-xs-12 col-sm-6 col-md-6 tbl-prc-col">
                        <stripe-form :product="{{ $lesson }}">
                            <template slot="paypal">
                                <form method="POST" action="/paypal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="productId" value="{{ $lesson->id }}" />
                                    <input type="hidden" name="productType" value="evaluation" />
                                    <div class="text-centre" style="margin-top: 28px;">
                                        <button class='btn btn-block btn-lg btn-primary'><i class="fab fa-cc-paypal fa-lg"></i>&nbsp; Оплатить используя PayPal</button>
                                    </div>
                                    
                                </form>
                            </template>
                        </stripe-form>
                    </div><!--/.col-->
                </div><!--/ .row-->

        @endguest

    </div>

@endsection