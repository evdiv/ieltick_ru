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
                            <p class="text-center"><a href='/subscriptions'>Вернуться к выбору экзаменов</a></p>
                        </div>
                    </div>
                </div>
            @endif


            @guest
                @include('frontend.auth.register')
            @else
            <div class="tbl-pricing">
                <div class="row">
                    <div class="col-xs-12 col-md-2"></div>

                    <div class="col-xs-12 col-sm-6 col-md-4 tbl-prc-col d-none d-sm-block">
                        <div class="tbl-prc-wrap">
                            @if($subscription->sale)
                                <div class="featured-price">скидка {{ $subscription->sale }}%</div>
                            @endif

                            <div class="tbl-prc-heading">
                                <h4>{{ $subscription->title }}</h4>
                            </div>

                            <div class="tbl-prc-price">
                                <h5>{{ $subscription->price }}<sup>.00</sup></h5>
                                <p>рублей</p> 
                            </div>

                            <div class="tbl-prc-description">
                                {{ $subscription->description }}
                            </div>

                        </div>
                    </div><!--/.col -->


                    <div class="col-xs-12 col-sm-6 col-md-6 tbl-prc-col">
                        <stripe-form :product="{{ $subscription }}">
                            <template slot="paypal">
                                <form method="POST" action="/paypal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="productId" value="{{ $subscription->id }}" />
                                    <input type="hidden" name="productType" value="subscription" />
                                    <div class="text-centre" style="margin-top: 28px;">
                                        <button class='btn btn-primary'><i class="fab fa-cc-paypal fa-lg"></i>&nbsp; Оплатить используя PayPal</button>
                                    </div>
                                    
                                </form>
                            </template>
                        </stripe-form>
                    </div><!--/.col-->
                </div><!--/ .row-->

            @endguest

        </div><!--/ .container-->
    </div>

@endsection