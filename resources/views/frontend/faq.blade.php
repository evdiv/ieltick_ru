@extends('frontend.layouts.tmpl')

@section('title', 'Часто задаваемые вопросы')
@section('meta_description', 'Часто задаваемые вопросы о подготовке к сдаче IELTS Speaking используя сервис АйЭлТик')
@section('meta_keywords', 'секреты ielts, материалы по ielts speaking, ielts speaking подготовка, ielts онлайн пробный, онлайн подготовка ielts, обучение ielts speaking')

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
                        <span>FAQ</span>
                      <h2>Часто задаваемые вопросы</h2>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">

                    <p>
                        <h5><i class="fas fa-question-circle content-icon"></i>&nbsp;&nbsp;&nbsp;
                        У меня не идёт запись голоса в процессе экзамена, я вижу только красную кнопку, но ничего не происходит.</h5>
                        Проверьте есть ли в вашем компьютере встроенный микрофон, если его нет, вам необходимо подключить либо наушники с микрофоном, либо внешний микрофон. Без микрофона прохождение подготовительных уроков невозможно.  
                    </p>

                
                    <p>
                        <h5><i class="fas fa-question-circle content-icon"></i>&nbsp;&nbsp;&nbsp;
                        Я не вижу изображения при попытке пройти урок. Вижу только чёрную область.</h5>
                        Некоторые браузеры не поддерживают передачу видео в том формате который используется у нас. Мы советуем пользоваться Google Chrome, Yandex Browser или Mozilla Firefox.
                    </p>


                    <p>
                        <h5><i class="fas fa-question-circle content-icon"></i>&nbsp;&nbsp;&nbsp;
                        Могу ли я послать для оценки моего уровня IELTS запись с демо урока?</h5>
                        Демо урок содержит всего несколько вопросов из первой части разговорного теста IELTS. Для оценки вашего уровня, экзаменатору необходимо прослушать ваши ответы во всех трёх частях экзамена, поэтому вы сможете отправить на оценку только полную запись.
                    </p>
     

                    <p>
                        <h5><i class="fas fa-question-circle content-icon"></i>&nbsp;&nbsp;&nbsp;
                        Чем отличается режим "Обучение" от режима "Экзамен"?</h5>
                        В режиме "Обучение" после вопроса экзаменатора, вам будут предложена вступительная фраза для начала вашего ответа она нужна для поднятия вашего балла за Fluency and Coherence, а также слова и идиомы которые дадут вам максимальный бал за Lexical Resource прохождении настоящего экзамена.
                    </p>


                    <p>
                        <h5><i class="fas fa-question-circle content-icon"></i>&nbsp;&nbsp;&nbsp;
                        Сколько раз я могу пройти каждый подготовительный экзамен?</h5>
                        Количество попыток пройти экзамен неограниченно. После того как вы пройдёте урок, вы можете нажать кнопку "Пересдать экзамен", запись вашего голоса будет стёрта с сервера и вы можете повторно его пройти.
                    </p>
                </div>
            </div>

        </div><!--/ .container -->
    </div><!--/. wrap-inner-page -->


@endsection