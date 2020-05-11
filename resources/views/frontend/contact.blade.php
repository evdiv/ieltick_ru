@extends('frontend.layouts.tmpl')

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
                        <span>Контакт с нами</span>
                        <h2>Форма обратной связи</h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    @include('frontend.layouts.errors')

                    @if(!Session::has('success'))


                        <ul class="themeioan_ul_icon">
                            <li><i class="fas fa-check-circle fa-lg"></i> &nbsp;&nbsp;У вас возникли вопросы?</li>
                            <li><i class="fas fa-check-circle fa-lg"></i> &nbsp;&nbsp;Вам потребовалась помощь?</li>
                            <li><i class="fas fa-check-circle fa-lg"></i> &nbsp;&nbsp;Вы хотите оставить отзыв о нашем сервисе или поделиться своей историей успеха при сдаче IELTS?</li>
                        </ul>

                        <p>Просто заполните форму, мы будем рады получить от вас сообщение и помочь в случае необходимости.</p>

                        <form method="POST" action="/contact" class="form">
                            <!-- Change Placeholder and Title -->
                            @csrf

                            <div class="input-text-hp">
                                <input type="text" name="fullname" value=""/>   
                                
                                <input type="text" name="website" value=""/>            

                                <input type="text" name="phone" value=""/>  
                            </div>


                            @guest

                                <div>
                                    <input class="input-text required-field" type="text" 
                                            name="name" 
                                            placeholder="Введите ваше имя" 
                                            value="{{ old('name') }}" required autofocus/>
                                </div>

                                <div>
                                    <input class="input-text required-field email-field" type="email" 
                                            name="email" 
                                            placeholder="Введите ваш email" 
                                            value="{{ old('email') }}" required/>
                                </div>

                            @endguest

                            <div>
                                <textarea rows="10" cols="50" class="input-text required-field" 
                                                    name="message" 
                                                    placeholder="Введите ваше сообщение" required></textarea>

                            </div>
                            <div style="text-align: right;">
                                <input class="color-two button" type="submit" value="Отправить"/>
                            </div>
                        </form>

                    @else
                       
                        <!-- <a href='/' class="color-two btn-custom">Вернуться на главную страницу</a> -->
                       
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->


@endsection