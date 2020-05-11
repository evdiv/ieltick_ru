<!-- header area start -->
<header id="header" class="transparent-header sticky-menu">
    <!-- #navigation start -->
    <nav class="navbar navbar-default navbar-expand-md navbar-light" id="navigation" data-offset-top="1">
        <!-- .container -->
        <div class="container">
            <!-- Logo and Menu -->
            <div class="navbar-header">
                <div class="navbar-brand"><a href="{{ config('app.url') }}"><img src="/tmpl/images/logo.png" alt="Logo"/></a></div>
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

                    <li><a style="color: #9ea3af;" href="/lessons/" ><i class="fas fa-user-circle navbar-icon"></i>  {{ Auth::user()->name }}</a></li>

                    <li><a href="/lessons/"><i class="fas fa-list-ol"></i> Мои экзамены</a></li>
                    <li><a href="/account/"><i class="fas fa-wrench"></i> Настройки</a></li>
                    <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Выйти</a></li> 
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