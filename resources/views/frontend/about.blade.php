@extends('frontend.layouts.tmpl')

@section('title', 'Сервис для самостоятельной подготовки к IELTS Speaking')
@section('meta_description', 'Зарегистрируйтесь для эффективной и быстрой подготовки к сдаче IELTS Speaking.')
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
                    <div class="section-title with-p">
                        <span>О Сервисе</span>
                      <h2>Сервис для самостоятельной подготовки к IELTS Speaking</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title with-p">
                        <img src="tmpl/images/content/landing/students.jpg" style="float:left; width: 530px; margin: 0 25px 15px 0;" class="d-sm-none d-md-block" alt="Студенты">
                        <p>Если вы уже пытались сдать IELTS, вы наверняка знаете как сложно получить требуемый балл за разговорную часть. Многие считают, что нужно просто зайти и 15 минут говорить на английском отвечая на вопросы экзаменатора и высокий балл обеспечен. К сожалению это ошибочное мнение, разговорная часть IELTS оценивается по строго определённым параметрам и не зная что конкретно оценивает экзаменатор очень сложно получить ваш возможный максимум. В то же время при правильной подготовке и зная что конкретно оценивается можно даже при среднем уровне владения языком получить 7.0</p>
                        <hr />
                        <p>Сервис IELTick нацелен на эффективную самостоятельную подготовку студентов к IELTS Speaking за счёт использования специально подготовленных обучающих интерактивных экзаменов. В предлагаемых интерактивных экзаменах собраны часто встречаемые топики и вопросы с актуальных тестов IELTS. Каждый экзамен включает в себя режим обучения и режим тестирования, они оба проходят в формате вопрос - ответ и максимально схожи с тем, что вы встретите на настоящем тесте. В режиме обучения после вопроса от экзаменатора вы будете видеть слова, фразы и идиомы которые дадут вам максимальный балл поэтому сможете строить свой ответ соответствующе.</p>

                        <p>После прохождения любого полного экзамена у вас будет возможность отправить свою речь на оценку экзаменаторам.</p>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- courses area end -->

    <!-- features area start -->
    <div id="features" class="wrap-bg">
        <!-- .container -->
        <div class="container">
            <div class="post-heading-center section-title mb-60">
                <span>В чем эффективность?</span>
                <h2>Основные достоинства подготовки к IELTS c нами</h2>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <!-- 1 -->
                    <div class="single-features-light text-center"><!-- single features -->
                        <div class="move">
                        <!-- uses solid style -->
                        <i class="secondary-color fas fa-chalkboard-teacher fa-3x"></i>
                        <h4><a href="#">Реалистичность экзамена</a></h4>
                        <p>Экзамены созданы с максимальной реалистичностью. Это поможет снять стресс и подготовить вас при сдаче экзамена лицом к лицу с экзаменатором. Пройдя даже один пробный экзамен вы будете иметь представление чего ожидать на настоящем экзамене.</p>
                        </div>
                    </div><!-- end single features -->
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4">
                    <!-- 3 -->
                    <div class="single-features-light text-center"><!-- single features <i class="fas fa-user-graduate"></i>-->
                        <div class="move">
                        <i class="secondary-color fab fa-leanpub fa-3x"></i>
                        <h4><a href="#">Режимы обучения и тестирования</a></h4>
                        <p>У каждого экзамена имеется два основных режима, режим подготовки в котором вам будут предложены вступительные фразы, ключевые слова и идиомы, а так же режим тестирования где вы сможете проверить свои знания перед сдачей IELTS.</p>
                        </div>
                    </div><!-- end single features -->
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4">
                    <!-- 2 -->
                    <div class="single-features-light text-center"><!-- single features -->
                        <div class="move">
                        <i class="secondary-color fas fa-graduation-cap fa-3x"></i>
                        <h4><a href="#">Оценка по стандарту IELTS</a></h4>
                        <p>После окончания экзамена вы сможете отправить свою речь на предварительную оценку. Оценка в среднем занимает 24 часа и после её окончания вы получите отчёт с анализом вашей речи по стандарту IELTS</p>
                        </div>
                    </div><!-- end single features -->
                </div>

            </div>
            <!-- .row end -->

            <div class="row" style="margin-top: 30px;">

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    @guest
                    
                    <a href="/register" class="btn btn-success btn-block btn-lg">Бесплатное  Демо &nbsp;<i class="fas fa-lg fa-arrow-right"></i></a>

                    @else
                        <a class="btn btn-success btn-block btn-lg" href="/subscriptions"><i class="fas fa-shopping-cart"></i>&nbsp;Купить экзамены</a>

                    @endguest 
                </div>
                <div class="col-md-4"></div>
            </div>


        </div>
        <!-- .container end -->
    </div>
    <!-- features area end -->

@endsection