@extends('frontend.layouts.tmpl')

@section('title', 'Статьи для тех кто готовится к сдаче IELTS Speaking')
@section('meta_description', 'Полезные статьи и советы для подготовки к сдаче IELTS Speaking.')
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
                        <span>Блог</span>
                      <h2>Статьи для тех кто готовится к сдаче IELTS</h2>
                    </div>
                </div>
            </div>

                
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
                                            <!-- <li><i class="fas fa-comment-dots"></i> 350</li> -->
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


        </div>
    </div>
    <!-- courses area end -->

@endsection