@extends('frontend.layouts.dashboard')

@section('title', 'Экзамены для самостоятельной подготовки к IELTS Speaking.')

@section('header')
    @include('frontend.includes.dashboard-header')
@endsection


@section('content')

    <div class="wrap-bg wrap-bg-dark wrap-inner-page">
        <div class="container content">

            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <div class="section-title with-p">
                        <span>Настройки</span>

                        <h3 class="d-none d-sm-block">Здесь вы можете изменить имя или пароль</h3>
                        <h5 class="d-block d-sm-none">Здесь вы можете изменить имя или пароль</h5>

                    </div>
                </div>
            </div>


            <div class="row justify-content-center text-center">
                <div class="col-sm-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ваши данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Изменить Имя</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Изменить Пароль</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" style="background-color: #fff;" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br/><br/>
                            <table class="table table-hover">
                                <tr>
                                    <th>Имя</th>
                                    <td>{{ !empty($logged_in_user->first_name) ? $logged_in_user->first_name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td>{{ !empty($logged_in_user->email) ? $logged_in_user->email : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Дата регистрации</th>
                                    <td>{{ $logged_in_user->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
                                </tr>
                            </table>
                        </div>


                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br/><br/>
                            {{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

                                <div class="form-group">

                                    <label>Введите новое имя</label>
                                    {{ Form::input('text', 'first_name', null, ['class' => 'form-control', 'placeholder' => 'Ваше имя']) }}
                                    
                                </div>

                                <div class="form-group">
                                    <br/><br/>
                                    {{ Form::submit('Изменить имя', ['class' => 'color-two button', 'id' => 'update-profile']) }}
                                </div>

                            {{ Form::close() }}
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <br/><br/>
                            {{ Form::open(['route' => ['frontend.auth.password.change'], 'class' => 'form-horizontal', 'method' => 'patch']) }}

                                <div class="form-group">
                                        {{ Form::input('password', 'old_password', null, ['class' => 'form-control', 'placeholder' => 'Введите Ваш текущий пароль']) }}
                                </div>

                                <hr/><br/>

                                <div class="form-group">
                                    {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Введите новый пароль']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Подтвердите новый пароль']) }}
                                </div>

                                <div class="form-group">
                                    <br/><br/>
                                    {{ Form::submit('Изменить пароль', ['class' => 'color-two button', 'id' => 'change-password']) }}
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div><!--/ .tab-content -->

                </div><!--/ .col-xs-12 -->
            </div><!--/ .row -->
        </div>
    </div>
@endsection