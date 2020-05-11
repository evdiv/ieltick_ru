<!-- header area start -->
<header id="header" class="transparent-header">
    <!-- #navigation start -->
    <nav class="navbar navbar-default navbar-expand-md navbar-light" id="navigation" data-offset-top="1">
        <!-- .container -->
        <div class="container">
            <!-- Logo and Menu -->
            <div class="navbar-header">
                <div class="navbar-brand"><a href="{{ config('app.url') }}"><img src="tmpl/images/logo.png" alt="Logo"/></a></div>
                <!-- site logo -->
            </div>
            <!-- Menu Toogle -->
                <div class="burger-icon">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            <div class="collapse navbar-collapse " id="navbarCollapse">

                <ul class="nav navbar-nav ml-auto">
                    <!-- Menu Link -->
                    <li class="subnav">
                        <a href="/">Главная</a>
                    </li>
                    <li><a href="/about">О Сервисе</a></li>
                    <li><a href="/#pricing">IELTS Пробные экзамены</a></li>
                    <li><a href="/blog">Блог</a></li>
                    <li class="subnav">
                        <a href="/contact">Помошь</a>
                        <ul class="sub-menu">
                            <li><a href="/contact">Контакт</a></li>
                            <li><a href="/faq">Часто задаваемые вопросы</a></li>
                        </ul>
                    </li>


                    <!-- Authentication Links -->
                    @guest

                        <li>
                            <a href="/login">Войти</a>
                        </li>

                        <li>
                            <a href="/register">Зарегистрироваться</a>
                        </li>
                    @else
                        <li class="subnav">
                            <a href="/lessons/"><i class="fas fa-user-circle navbar-icon"></i> Личный кабинет {{ Auth::user()->name }}</a>
                            <ul class="sub-menu">
                                <li><a href="/lessons/">Мои экзамены</a></li>
                                <li><a href="/account/">Настройки</a></li>
                                <li><a href="/logout">Выйти</a></li>
                            </ul>
                        </li>

                    @endguest 
                    <!-- /Authentication Links -->
                </ul>

                <!--
                    <div class="header-cta">
                        <a href="contact.html" class="btn btn-1c">Free Trial</a>
                    </div>
                -->
            </div>
            <!-- Menu Toogle end -->
        </div>
        <!-- .container end -->
    </nav>
    <!-- #navigation end -->
</header>
<!-- end header area -->    