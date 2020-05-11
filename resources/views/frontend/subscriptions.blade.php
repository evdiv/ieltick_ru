@extends('frontend.layouts.tmpl')

@section('title', 'Пакеты из пробных экзаменов для самостоятельной подготовки к IELTS Speaking.')
@section('meta_description', 'Здесь вы можете выбрать подходящий для себя пакет из пробных экзаменов для эффективной подготовке к сдаче IELTS Speaking.')
@section('meta_keywords', 'ielts speaking подготовка, ielts онлайн пробный, онлайн подготовка ielts, обучение ielts speaking')

@section('header')
    @include('frontend.includes.inner-header')
@endsection


@section('content')

    <!-- courses area start -->
    <div class="wrap-bg wrap-bg-dark wrap-inner-page">
        <div class="container">

            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <div class="section-title with-p d-none d-sm-block">
                        <span>Пробные экзамены для подготовке к IELTS Speaking</span>
                        <h3 style="margin-bottom: 50px;">Выберите пакет из подготовительных экзаменов IELTS Speaking</h3>
                    </div>

                    <div class="section-title with-p d-block d-sm-none">
                        <h4 style="margin-bottom: 5px;">Выберите пакет из подготовительных экзаменов IELTS Speaking</h4>
                    </div>
                </div>
            </div>


            <!-- pricing area start -->
            <div id="pricing" class="wrap-bg-dark">
                <!-- .container -->
                <div class="container">

                    <!-- .tbl-pricing -->
                    <div class="tbl-pricing">
                        <div class="row">

                            @foreach($subscriptions as $key=>$subscription)
                                
                                <div class="col-xs-12 col-sm-12 col-md-4 tbl-prc-col">
                                    <!-- 1Subscription # {{ $subscription->id }} -->
                                    <div class="tbl-prc-wrap">
                                        @if($subscription->sale)
                                            <div class="featured-price">скидка {{ $subscription->sale }}%</div>
                                        @endif

                                        <div class="tbl-prc-heading">
                                            <h4>{{ $subscription->title }}</h4>
                                        </div>

                                        @if($subscription->price > 0)
                                            <div class="tbl-prc-price">
                                                <h5>{{ $subscription->price }}<sup>.00</sup></h5>
                                                <p>рублей</p> 
                                            </div>

                                            <div class="tbl-prc-description">
                                                {{ $subscription->description }}
                                            </div>

                                            <div class="tbl-prc-footer">
                                                @if($subscription->featured > 0)
                                                    <a href="/subscriptions/{{ $subscription->id }}" class="color-two btn-custom">Купить</a>
                                                @else
                                                    <a href="/subscriptions/{{ $subscription->id }}" class="color-one btn-custom">Купить</a>
                                                @endif
                                                
                                            </div>

                                        @else
                                            <div class="tbl-prc-price" style="width:100%; background-color: #fff;">
                                                <h5>Бесплатно</h5>
                                                <p></p>
                                            </div>
                                            
                                            <div class="tbl-prc-description">
                                                {{ $subscription->description }}
                                            </div>
                                            
                                            <div class="tbl-prc-footer">
                                                <a href="/register" class="color-one btn-custom">Зарегистрироваться</a>
                                            </div>

                                        @endif

                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                    <!--/ .tbl-pricing -->
                </div>
                <!--/ .container -->
            </div>
            <!--/ pricing area -->

        </div><!--/ .container-->
    </div>

@endsection