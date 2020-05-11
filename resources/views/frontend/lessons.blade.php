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
                        <span>Мои Экзамены</span>
                      <h3 class="d-none d-sm-block" style="margin-bottom: 50px;">Доступные подготовительные экзамены IELTS Speaking</h3>
                      <h5 class="d-block d-sm-none" style="margin-bottom: 20px;">Доступные подготовительные экзамены IELTS Speaking</h5>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">

                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-sm">
                        <thead>
                            <tr class="d-none d-sm-table-row">
                                <th class="text-center" scope="col"></th>
                                <th scope="col">#</th>
                                <th class="text-center" scope="col">Добавлен</th>
                                <th class="text-center" scope="col">Закончен</th>
                                <th class="text-center" scope="col">IELTS балл</th>
                                <th class="text-center" scope="col" style="min-width: 100px;">Действия</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($lessons['active']->count() > 0)
                                <tr class="d-none d-sm-table-row table-warning">
                                    <td></td>
                                    <td><h6 style="margin-top: 12px;">Активные экзамены</h6></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr class="d-table-row d-sm-none table-warning">
                                    <td>Активные экзамены</td>
                                    <td style="min-width: 100px; text-align: center;">Действия</td>
                                </tr>                                        

                            @endif

                            @foreach($lessons['active'] as $lesson)
                                <tr class="d-none d-sm-table-row" onclick="window.location='/lessons/{{ $lesson->id }}';">
                                    <td></td>
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}</a>
                                    </td>
                                    <td class="text-center"><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                    <td class="text-center"><small><i class="fas fa-minus"></i></small></td>
                                    <td class="text-center"><small><i class="fas fa-minus"></i></small></td>
                                    <td class="text-center">
                                        <a href="/lessons/{{ $lesson->id }}" title="Начать экзамен"><i class="far fa-eye fa-lg text-success"></i></a></td>
                                </tr>

                                <tr class="d-table-row d-sm-none" onclick="window.location='/lessons/{{ $lesson->id }}#exam-main-content';">
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}#exam-main-content">{{ $lesson->exam->title }}</a>
                                        <br/><small>Добавлен {{ $lesson->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td style="text-align: center;"><a href="/lessons/{{ $lesson->id }}#exam-main-content" title="Начать экзамен"><i class="far fa-eye text-success"></i></a></td>
                                </tr>    
                            @endforeach

                        
                            @if($lessons['completed']->count() > 0 
                                || $lessons['onEvaluation']->count() > 0
                                || $lessons['evaluated']->count() > 0)

                                <tr class="d-none d-sm-table-row table-warning">
                                    <td></td>
                                    <td><h6 style="margin-top: 12px;">Законченные экзамены</h6></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr class="d-table-row d-sm-none table-warning">
                                    <td>Законченные</td>
                                    <td style="min-width: 100px; text-align: center;">Действия</td>
                                </tr>    

                            @endif


                            @foreach($lessons['completed'] as $lesson)

                                <tr class="d-none d-sm-table-row">
                                    <td></td>
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}</a>
                                    </td>
                                    <td class="text-center"><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                    <td class="text-center"><small><i class="fas fa-check-double"></i></small></td>
                                    <td class="text-center"><small><i class="fas fa-minus"></i></small></td>
                                    <td class="text-center">

                                        <a href="#" data-toggle="modal" data-target="#retakeConfirmationModal-{{ $lesson->id }}" title="Пересдать экзамен">
                                            <i class="fas fa-sync"></i>
                                        </a>

                                        <a href="#" data-toggle="modal" data-target="#evaluateConfirmationModal-{{ $lesson->id }}" title="Отправить на оценку">
                                            <i class="far fa-share-square"></i>
                                        </a>

                                    </td>
                                </tr>


                                <tr class="d-table-row d-sm-none">
                                    <td>
                                         <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}</a>
                                          <br/><small>Добавлен {{ $lesson->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td style="text-align: center;">
                                        
                                        <a href="#" data-toggle="modal" data-target="#retakeConfirmationModal-{{ $lesson->id }}" title="Пересдать экзамен">
                                            <i class="fas fa-sync"></i>
                                        </a>

                                        <a href="#" data-toggle="modal" data-target="#evaluateConfirmationModal-{{ $lesson->id }}" title="Отправить на оценку">
                                            <i class="far fa-share-square"></i>
                                        </a>
                                    </td>
                                </tr>    



                                <tr>
                                    <td style="border-top: none;">
                                    <!-- Modal -->
                                    <div class="modal fade" id="retakeConfirmationModal-{{ $lesson->id }}" tabindex="-1" role="dialog" 
                                        aria-labelledby="retakeConfirmationModal-{{ $lesson->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content text-dark">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Пройти экзамен повторно?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body text-left">
                                                    Вы хотите пройти повторно этот экзамен?<br/>
                                                    Аудиозапись вашей речи будет удалена.
                                                </div>
                                                <div class="modal-footer">

                                                    <form method="POST" action="/lessons/{{ $lesson->id }}">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="completed" value="0" >
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                        <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-sync"></i> &nbsp;Да, всё верно
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Modal -->


                                    <!-- Modal -->
                                    <div class="modal fade" id="evaluateConfirmationModal-{{ $lesson->id }}" tabindex="-1" role="dialog" 
                                        aria-labelledby="evaluateConfirmationModal-{{ $lesson->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content text-dark">
                                                <div class="modal-header">

                                                    @if($lesson->exam->id > 1)
                                                        <h4 class="modal-title">Отправить на оценку?</h4>
                                                    @else 
                                                        <h4 class="modal-title">Демо экзамен не доступен для оценки</h4>
                                                    @endif

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body text-left">

                                                    @if($lesson->exam->id > 1)
                                                        Ваши записи будут отправлены на оценку экзаменатору IELTS.
                                                        Оценка производится в течении 24 часов, после её окончания вам для скачивания будет доступен отчёт с указанием сильных и слабых сторон вашего спикинга.
                                                       <br/><br/><br/>
                                                        <h3>Стоимость оценки составляет {{ env('EVALUATION_COST') }}р.</h3>
                                                    @else 
                                                       Так как демо экзамен состоит только из нескольких вопросов первой части IELTS Speaking Test, он не доступен для отправки на проверку. <br/>
                                                       Вы можете купить любой из полных экзаменов <a href='/subscriptions'>здесь</a>.<br/>
                                                       Спасибо за подготовку к IELTS с нами.
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                    @if($lesson->exam->id > 1)
                                                        <a href="/evaluate/{{ $lesson->id }}" class="btn btn-success">
                                                            <i class="far fa-share-square"></i> &nbsp;Отправить на оценку
                                                        </a>
                                                    @endif    

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Modal -->
                                </td>
                            </tr>
                            @endforeach


                            @foreach($lessons['onEvaluation'] as $lesson)
                                <tr class="d-none d-sm-table-row">
                                    <td></td>
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}</a>
                                    </td>
                                    <td class="text-center"><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                    <td class="text-center"><small><i class="fas fa-check-double"></i></small></td>
                                    <td class="text-center"><small><i class="fas fa-minus"></i></small></td>
                                    <td class="text-center">
                                        <h5><span class="badge badge-warning" title="Экзамен находится на проверке, обычно оценка занимает 24 часа, после её завершения у нас появится возможность сказать отчёт.">на проверке...</span></h5>
                                    </td>
                                </tr>


                                <tr class="d-table-row d-sm-none">
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}"></a>
                                        <br/><small>Добавлен {{ $lesson->created_at->diffForHumans() }}</small>
                                    </td>

                                    <td style="min-width: 100px; text-align: center;">
                                        <br/><br/>
                                        <h5><span class="badge badge-warning" title="Экзамен находится на проверке, обычно оценка занимает 24 часа, после её завершения у нас появится возможность сказать отчёт.">на проверке...</span></h5>
                                    </td>
                                </tr>    
                            @endforeach


                            @foreach($lessons['evaluated'] as $lesson)
                                <tr class="d-none d-sm-table-row">
                                    <td></td>
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}</a>
                                    </td>
                                    <td class="text-center"><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                    <td class="text-light text-center"><i class="far fa-check-circle fa-lg"></i></td>
                                    <td class="text-center"><span class="badge badge-pill badge-danger">{{ $lesson->evaluation->mark }}</span></td>
                                    <td class="text-center"><a href="/lessons/{{ $lesson->id }}" title="Посмотреть отчёт"><i class="far fa-file-alt"></i></a></td>
                                </tr>

                                <tr class="d-table-row d-sm-none" onclick="window.location='/lessons/{{ $lesson->id }}';">
                                    <td>
                                        <a href="/lessons/{{ $lesson->id }}">{{ $lesson->exam->title }}</a><br/>
                                        <small>Добавлен {{ $lesson->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td style="min-width: 100px; text-align: center;">
                                        Балл <span class="badge badge-pill badge-danger">{{ $lesson->evaluation->mark }}</span>
                                        <br/><br/>
                                        <a href="/lessons/{{ $lesson->id }}" data-toggle="tooltip" data-placement="top" title="Посмотреть отчёт"><i class="far fa-file-alt"></i></a>
                                    </td>
                                </tr>    

                            @endforeach

                        </tbody>
                   </table>
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-md-12 text-right">
                    <a class="btn btn-success" href="/subscriptions"><i class="fas fa-shopping-cart"></i>&nbsp;Купить экзамены</a>
                </div>
            </div>

        </div>
    </div>
@endsection