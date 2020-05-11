@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title', config('app.name'))</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Improve your IELTS Speaking score with the IELTick')">
        <meta name="keywords" content="@yield('meta_keywords', 'ielts speaking подготовка, ielts онлайн пробный, онлайн подготовка ielts, обучение ielts speaking')">
        
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        {{ Html::style('tmpl/css/bootstrap.min.css') }}
        {{ Html::style('tmpl/css/dashboard-main.css') }}
        {{ Html::style('tmpl/css/all.min.css') }}

        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body id="app-layout">
        @include('includes.partials.ga')
        <div id="app">

            @yield('header')

            <main>
                @include('includes.partials.messages')
                @yield('content')
            </main>
            
            @include('frontend.includes.dashboard-footer')

        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        
        {{ Html::script('tmpl/js/jquery-3.4.1.min.js') }}
        {{ Html::script('tmpl/js/main.js') }}
        {{ Html::script('tmpl/js/bootstrap.min.js') }}

        @yield('after-scripts')
    </body>
</html>