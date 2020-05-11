@extends('frontend.layouts.tmpl')

@section('title', $post->name)
@section('meta_description', strip_tags($post->meta_description))
@section('meta_keywords', $post->meta_keywords)

@section('header')
    @include('frontend.includes.inner-header')
@endsection


@section('content')

    <div class="wrap-bg wrap-bg-dark wrap-inner-page">
        <div class="container">

            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <div class="section-title with-p">
                        <a href="/blog"><span>Статьи для тех кто готовится к сдаче IELTS</span></a>
                      <h2>{{ $post->name }}</h2>
                    </div>
                </div>
            </div><!--/ .row-->

                
            <div class="row">
                <div class="col-md-12">
                    <div style="text-align: right">

                    <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,whatsapp"></div>
                </div>

                    <div class="blog-content">
                        <div class="section-title">
                            <div class="course-viewer">
                                <ul>
                                    <!-- <li><i class="fas fa-user"></i> {{ $post->owner->first_name }} {{ $post->owner->last_name }}</li> -->
                                    <li><i class="far fa-calendar-alt"></i> {{ $post->publish_datetime }}</li>
                                </ul>
                            </div>
                        </div>
                        
                        {!! $post->content !!}

                    </div>
                </div>
            </div><!--/ .row-->

            <hr/>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <p><a href="/#pricing" class="color-two btn-custom">
                        Пробные экзамены для самостоятельной подготовки к IELTS Speaking &nbsp;<i class="fas fa-lg fa-arrow-right"></i>
                    </a></p>
                </div>
                <div class="col-sm-2"></div>
            </div>

        </div><!--/ .container -->
    </div>

@endsection