@extends('frontend.layouts.tmpl')

@section('header')
    @include('frontend.includes.hero-header')
@endsection


@section('content')

    <!-- header content area start -->
    <div class="header-content bg-home-ome" role="banner">
        <!-- .container -->
        <div class="container">
            <!-- .row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 header-area">
                    <div class="header-area-inner header-text"> <!-- single content header -->
                        <div><span class="subtitle ">Нужно <span class="base-color">сдать IELTS Speaking на 7.0</span> или выше?</span></div>
                        <h1 class="title">Пробные экзамены для самостоятельной подготовки к IELTS Speaking</h1>
                        
                        <p>Если вам нужно подготовится к разговрной части IELTS быстро, эффективно и недорого, вы можете воспользоваться подготовительными онлайн экзаменами по IELTS Speaking. Экзамены созданны при участии настоящих экзаменаторов IELTS на основе действующих на 2020 год скриптов для тестирования. 
                        </p>
                        <div class="btn-section">
                            @guest
                                <a href="/register" class="color-two btn-custom smooth-scroll">Бесплатное  Демо &nbsp;<i class="fas fa-lg fa-arrow-right"></i></a>
                            @else
                                <a class="btn btn-success btn-lg" href="/subscriptions"><i class="fas fa-shopping-cart"></i>&nbsp;Купить экзамены</a>
                            @endguest                             



                            <!-- <div class="video-relative">
                            <a href="https://www.youtube.com/watch?v=TKnufs85hXk" class="video-btn popup-video ">
                                <i class="fas fa-play"></i>
                                <span class="ripple orangebg"></span>
                                <span class="ripple orangebg"></span>
                                <span class="ripple orangebg"></span>
                            </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </div>
    <!-- end header content area start -->

    <!-- features area start -->
    <div id="features" class="wrap-bg">
        <!-- .container -->
        <div class="container">
            <div class="post-heading-center section-title mb-60">
                <span>В чём заключаются и как работают?</span>
                <h2>Интерактивные пробные экзамены IELTS Speaking</h2>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <!-- 1 -->
                    <div class="single-features-light text-center"><!-- single features -->
                        <div class="move">
                        <!-- uses solid style -->
                        <i class="secondary-color fas fa-video fa-3x"></i>
                        <h4><a href="#">Визуальное представление</a></h4>
                        <p>Каждый подготовительный тест записан с участием настоящего экзаменатора IELTS. Вам будут заданы вопросы в той же манере, интонации и последовательности в которой они задаются на реальном экзамене... </p>
                            <div class="feature_link">
                                <a href="#">Узнать больше <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- end single features -->
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4 ">
                    <!-- 3 -->
                    <div class="single-features-light text-center"><!-- single features -->
                        <div class="move">
                        <i class="secondary-color fab fa-leanpub fa-3x"></i>
                        <h4><a href="#">Построение словарного запаса</a></h4>
                        <p>В режиме обучения вам будут показываться релевантные слова и фразы относящиеся к теме вопроса. Используя эту лексику на настоящем экзамене вы сможете повысить балл за ваш словарный запас и связность речи...</p>
                        <div class="feature_link">
                            <a href="#">Узнать больше  <i class="fas fa-arrow-right"></i></a>
                        </div>
                        </div>
                    </div><!-- end single features -->
                </div>


                <div class="col-xs-12 col-sm-12 col-md-4">
                    <!-- 2 -->
                    <div class="single-features-light text-center"><!-- single features -->
                        <div class="move">
                        <i class="secondary-color fas fa-chart-bar fa-3x"></i>
                        <h4><a href="#">Тестирование разговорной речи </a></h4>
                        <p>После каждого вопроса от экзаменатора, система переходит в режим записи и "слушает" ваш ответ. Ваши ответы записываются на сервере для последующей оценки экзаменатором вашей разговорной речи ...</p>
                            <div class="feature_link">
                                <a href="#">Узнать больше <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- end single features -->
                </div>

            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </div>
    <!-- features area end -->

    <!-- courses area start -->
    <div id="courses" class="wrap-bg wrap-bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title with-p">
                        <span>Как ваш сервис поможет мне быстро поднять балл IELTS?</span>
                        <h2>Вы натренируетесь использовать релевантную лексику, <br/>идиоматические выражения и связующие фразы.</h2>

                        <p>Для того, чтобы получить максимально возможный балл за разговорную часть IELTS нужно понимать как он оценивается. Несмотря на то, что экзамен проходит в формате вопрос- ответ, экзаменатор не оценивает содержание ответа, то есть IELTS это тот случай где форма важнее содержания. На нём не существует, правильных, неправильных, умных или глупых ответов. Важно не то, что вы говорите а как вы говорите. Ниже представлены четыре критерия на основе которых ставится общая оценка за устную часть.</p>

                        <ul class="themeioan_ul_icon">
                            <li><i class="fas fa-check-circle fa-lg"></i> Fluency and Coherence - беглость и связность речи</li>
                            <li><i class="fas fa-check-circle fa-lg"></i> Lexical Resource - разнообразие и точность употребляемой лексики</li>
                            <li><i class="fas fa-check-circle fa-lg"></i> Grammatical Range and Accuracy - многообразие используемых грамматических структур и грамматические ошибки</li>
                            <li><i class="fas fa-check-circle fa-lg"></i> Pronunciation - произношение</li>
                        </ul>

                        <p>Выучить грамматику и улучшить произношение за несколько недель невозможно, но вполне возможно запомнить высоко-релевантные слова и идиоматические выражения по основным топикам экзамена. Используя эти слова вместе со связующими шаблонными фразами вы можете значитеально повысить свой балл за лексику (Lexical Resource) и за связность речи (Fluency and Coherence).
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- courses area end -->

    <!-- why-us area start -->
    <div id="why-us" class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-xl-6 col-lg-5 why-us-left-bg">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-xl-6 col-lg-7 wrap-padding">
                <div class="section-title">
                    <div>
                        <span>Как пройти пробный тест IELTS?</span>
                        <h3>Для прохождения пробных экзаменов вам понадобится:</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 text-center">
                        <i class="fas fa-wifi fa-3x text-muted"></i>
                    </div>
                    <div class="col-lg-10 col-equipment">
                        Стабильное и быстрое интернет соединение. Так как в процессе обучения требуется постоянное подгрузка информации с нашего сервера, стабильное интернет соединение крайне важно.
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-2 text-center">
                        <i class="fas fa-desktop fa-3x text-muted"></i>
                    </div>
                    <div class="col-lg-10 col-equipment">
                        Компьютер с интернет браузером. Желательно использовать Google Chrome, так как в некоторых "экзотических" браузерах экзамены могут отображаться некорректно.
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-2 text-center">
                        <i class="fas fa-headphones-alt fa-3x text-muted"></i>
                    </div>
                    <div class="col-lg-10 col-equipment">
                        Если вы находитесь в тихой обстановке вы можете обойтись без наушников, в противном случае наушники крайне желательны, так как вам придётся отвечать на устные вопросы экзаменатора.
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 text-center">
                        <i class="fas fa-microphone-alt fa-3x text-muted"></i>
                    </div>
                    <div class="col-lg-10">
                        Если у вас нет внешнего микрофона вы можете использовать встроенный, единственное удостоверьтесь в его работоспособности. Запись вашего голоса понадобится при оценке экзаменатором.
                    </div>                    

                </div>

            </div>
        </div>
    </div>
    <!-- why-us area end -->

    <!-- instructor area start -->
    <div id="instructor" class="call-to-action-area wrap-bg-secondary">
        <div class="container">
            <div class="row justify-content-xl-between justify-content-lg-center justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="call-to-action-content"> <!-- single instructor content-->
                        <div class="post-heading-left ">
                            <h3 class="text-white">Оценка вашей речи экзаменатором IELTS</h3>
                        </div>
                        <p class="text-white">Так как все ваши ответы записываются на сервере после прохождения пробного экзамена у вас будет возможность дополнительно заказать оценку своего уровня по стандарту IELTS. В среднем оценка занимает два рабочих дня. В субботу и воскресенье наш офис не работает поэтому пожалуйста учитывайте это при заказе отчёта. Стоимость оценки составляет {{ env('EVALUATION_COST') }}р.
                        </p>
                        <!--<div class="call-to-action-btn">
                            <a href="#">Посмотреть пример отчёта <i class="fas fa-arrow-right"></i></a>
                        </div>-->
                    </div>
                </div>
                <div class="col-xl-5 col-lg-0">
                    <div class="part-img">
                        <img src="tmpl/images/content/landing/instructor.png" alt="Like To Become An Instructor"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instructor area end -->

    <!-- pricing area start -->
    <div id="pricing" class="wrap-bg wrap-bg-dark">
        <!-- .container -->
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <div class="section-title with-p">
                        <span>Экзамены основаны на IELTS скриптах 2019 года</span>
                        <h2>Выберите подходящий пакет из пробных экзаменов <br/>IELTS Speaking</h2>
                        <p>Интерактивные экзамены включают в себя режимы обучения и тестирования, они проходят в формате вопрос - ответ и максимально схожи с тем, что вы встретите на настоящем экзамене. После прохождения любого полного экзамена у вас будет возможность заказать оценку вашей речи по стандартам IELTS. 
                        </p>
                    </div>
                </div>
            </div>
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
											<a href="/subscriptions/{{ $subscription->id }}" class="color-two btn-custom">Купить</a>
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


				<!--

                    <div class="col-xs-12 col-sm-12 col-md-4 tbl-prc-col">
                        
                        <div class="tbl-prc-wrap">
                            <div class="tbl-prc-heading">
                                <h4>Демо Экзамен</h4>
                            </div>


                            <div class="tbl-prc-price" style="width:100%; background-color: #fff;">
                                <h5>Бесплатно</h5>
                                <p></p> 
                            </div>


                            <ul class="tbl-prc-list">
                                <li><i class="fa fa-check"></i>В демо экзамен включены несколько вопросов из первой части устного модуля IELTS. После регистрации он появится в вашем личном кабинете. Перед покупкой полных экзаменов мы советуем сначала пройти демонстрационный экзамен и понять насколько этот подход удобен и эффективен для вас.</li>
                            </ul>
                            <div class="tbl-prc-footer">
                                <a href="/register" class="color-one btn-custom">Зарегистрироваться</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-4 tbl-prc-col">
                        
                        <div class="tbl-prc-wrap">
                            <div class="tbl-prc-heading">
                                <h4>1 Экзамен <br/>IELTS Speaking</h4>
                            </div>
                            <div class="tbl-prc-price">
                                <h5>149<sup>.00</sup></h5>
                                <p>рублей</p>
                            </div>
                            <ul class="tbl-prc-list">
                                <li><i class="fa fa-check"></i>Полный интерактивный пробный экзамен IELTS Speaking. Он состоит из трёх частей и включает несколько основных групп вопросов часто задаваемых экзаменаторами при прохождении настоящего теста. <br/>В экзамене имеется режим подготовки и режим тестирования. </li>
                            </ul>
                            <div class="tbl-prc-footer">
                                <a href="#" class="color-one btn-custom">Купить</a>
                            </div>
                        </div>
                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-4 tbl-prc-col tbl-prc-recommended">
                        
                        <div class="tbl-prc-wrap">
                            <div class="featured-price">скидка 33%</div>
                            <div class="tbl-prc-heading">
                                <h4>3 Экзамена <br/>IELTS Speaking</h4>
                            </div>
                            <div class="tbl-prc-price">
                                <h5>299<sup>.00</sup></h5>
                                <p>рублей</p>
                            </div>
                            <ul class="tbl-prc-list">
                                <li><i class="fa fa-check"></i>Пакет состоит из трёх полных интерактивных подготовительных экзаменов IELTS Speaking. Каждый экзамен состоит из трёх частей и включает наиболее часто встречаемые топики и вопросы задаваемые на экзамене IELTS. </li>
                            </ul>
                            <div class="tbl-prc-footer">
                                <a href="#" class="color-two btn-custom">Купить</a>
                            </div>
                        </div>
                    </div>

				-->


                </div>
            </div>
            <!--/ .tbl-pricing -->
        </div>
        <!--/ .container -->
    </div>
    <!--/ pricing area -->


    <!-- blog area start -->
    <div id="blog" class="wrap-bg wrap-bg-dark">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="section-title with-p">
                        <span>Полезное из нашего блога</span>
                        <h2>Статьи для тех кто готовится к сдаче IELTS</h2>
                        <p>Здесь вы найдете ценную информацию о тесте IELTS, стратегиях, советах и секретах успешной сдачи теста. Мы расскажем вам об общих ошибках, которые совершают студенты и предупредим о скрытых ловушках в тесте IELTS. Не стесняйтесь оставлять комментарии и задавать вопросы.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- .row -->
            <div class="row">

                @foreach($blog as $key=>$post)
                        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 blog-single">
                        <!-- 1 -->
                        <div class="themeioan_blog">
                            <article><!-- single blog articles -->
                                <div class="blog-photo">
                                    <a href="/blog/{{ $post->id }}/{{ $post->slug }}">
                                        <img src="/storage/img/blog/{{$post->featured_image}}" alt="{{ $post->name }}"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="course-viewer">
                                        <ul>
                                            <li><i class="fas fa-user"></i> {{ $post->owner->first_name }} {{ $post->owner->last_name }}</li>
                                            <li><i class="far fa-calendar-alt"></i> {{ $post->publish_datetime }}</li>
                                            <!-- <li><i class="fas fa-comment-dots"></i> 15</li> -->
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="/blog/{{ $post->id }}/{{ $post->slug }}">{{ $post->name }}</a></h5>
                                    <p>{!! $post->meta_description !!}</p>
                                    <a href="/blog/{{ $post->id }}/{{ $post->slug }}" class="readmore">Подробнее <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </article><!-- end single blog articles -->
                        </div>
                    </div>

                @endforeach

            </div>
            <!--/ .row -->
        </div>
    </div>
    <!--/ blog area -->



@endsection