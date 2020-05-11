@extends('frontend.layouts.dashboard')

@section('title', 'Экзамены для самостоятельной подготовки к IELTS Speaking.')

@section('header')
    @include('frontend.includes.dashboard-header')
@endsection


@section('content')

    <div class="wrap-bg wrap-bg-dark wrap-inner-page wrap-lesson-page">
        <div class="container content">

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>      


                @if($lesson->completed && !$lesson->evaluation)

                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12">
                            <div class="section-title with-p">
                                <span>Экзамен завершён</span>
                              <h2>Вы успешно прошли экзамен!</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title with-p">

                                @if($lesson->exam->id > 1)
                                    <p>Вы можете послать пройденный экзамен на оценку. После окончания проверки вам будет выставлен балл такой же какой бы вы получили при прохождении настоящего экзамена IELTS. Помимо этого вам будет доступен отчёт с оценкой  вашего спикинга по стандарту IELTS.</p>
                                    
                                @else 
                                    <p>Так как демо экзамен состоит только из нескольких вопросов первой части теста IELTS Speaking, он не доступен для отправки на проверку. <br/>
                                    Для того чтобы заказать оценку своего разговорного уровня, вам сначала нужно пройти <a href='/subscriptions'>любой из полных экзаменов</a>.</p>

                                @endif
                                    <p style="clear: both;"></p>
                            </div>
                        </div>
                    </div>

                        @if($lesson->exam->id > 1)

 							<div class="alert text-right">
	                            <a href="#" class="btn btn-danger" style="min-width: 300px; margin-bottom: 10px;"
	                                data-toggle="modal" data-target="#retakeConfirmationModal" title="Retake the exam">
	                                <i class="fas fa-sync"></i> Пройти экзамен ещё раз
	                            </a>

	                            <a href="#" class="btn btn-success" style="min-width: 300px; margin-bottom: 10px;"
	                                data-toggle="modal" data-target="#evaluateConfirmationModal" title="Send for evaluation">
	                                <i class="far fa-share-square"></i> Отправить на оценку
	                            </a>
	                        </div>
                        @else 
                         	<div class="alert text-center">
                            	<a class="btn btn-success" href="/subscriptions/"><i class="fas fa-shopping-cart"></i>&nbsp;Купить экзамены</a>
                            </div>
                        @endif
        
                @elseif($lesson->evaluation && !$lesson->evaluation->mark)

                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12">
                            <div class="section-title with-p">
                                <span>Экзамен завершён</span>
                              <h2>Аудиозапись речи на проверке</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title with-p">
                                Мы получили ваши записи для проверки. Сейчас они находятся на оценке экзаменатора IELTS. Оценка занимает в среднем 48 часов. 
                                После окончания проверки ваш уровень разговорного языка будет оценен примерно на такой же балл какой бы вы получили при прохождении настоящего экзамена IELTS. Помимо этого вам будет доступен отчёт с указанием сильных и слабых сторон вашего спикинга.
                            </div>
                        </div>

                        <div class="alert text-right">
                            <a href="/lessons" class="btn btn-info" 
                                data-toggle="tooltip" data-placement="top" title="Return to lessons">Мои экзамены
                            </a>
                        </div>
                    </div>    

                @elseif($lesson->evaluation && $lesson->evaluation->mark)

                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12">
                            <div class="section-title with-p">
                                <span>Экзамен завершён</span>
                              <h2>Оценка завершена</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title with-p">
                                Оценка завершена, вы можете скачать свой отчёт по ссылке ниже.
                            </div>
                        </div>
                    </div>                        

                    <div class="alert text-right">
                        <a href="/assessments/{{ $lesson->evaluation->report_src}}" class="btn btn-success"><i class="fas fa-download"></i> &nbsp;Скачать отчёт</a>
                    </div>

                @else

                    <div id="exam-main-content" class="row justify-content-center"> 
                        <div class="col text-left">
                            <h6>{{ $lesson->exam->title }} &nbsp;<switch-mode></switch-mode></h6>
                        </div>
                        
                        <div class="col text-right">                               
                    		@if ($lesson->exam->scripts)
                                <a href="/scripts/{{ $lesson->exam->scripts }}"> 
                                    Скачать лексику <i class="fas fa-file-download"></i>
                                </a>
                            @endif
                       	</div>

                       	<is-studing></is-studing>


                        <recorder id="{{ $lesson->id }}" 
                            demo="{{ $lesson->exam->id == 1 ? 1 : 0}}" 
                            src="/exams/{{ $lesson->exam->src }}" 
                            intervals-str="{{ $lesson->exam->intervals }}"
                            first-part-end="{{ $lesson->exam->firstPartEnd }}" 
                            second-part-start="{{ $lesson->exam->secondPartStart }}"
                            length="{{ $lesson->exam->length }}">
                                
                            <study-mode 
                                first-part-end="{{ $lesson->exam->firstPartEnd }}"    
                                phrases="{{ $lesson->exam->phrases->toJson() }}"
                                nouns="{{ $lesson->exam->nouns->toJson() }}"
                                verbs="{{ $lesson->exam->verbs->toJson() }}"
                                adjectives="{{ $lesson->exam->adjectives->toJson() }}"
                                idioms="{{ $lesson->exam->idioms->toJson() }}"></study-mode>
                        </recorder>
                    </div>
                            
                @endif
        </div>


        <!-- Modal -->
        <div class="modal fade" id="retakeConfirmationModal" tabindex="-1" role="dialog" 
            aria-labelledby="retakeConfirmationModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Пройти экзамен ещё раз?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Вы хотите пройти этот экзамен ещё раз?<br/>
                        При пересдаче, существующая аудиозапись вашей речи будет удалена.
                    </div>
                    <div class="modal-footer">

                        <form method="POST" action="/lessons/{{ $lesson->id }}" style="display: inline-block;">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="completed" value="0" >
                            <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-sync"></i> &nbsp;Пройти ещё раз
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--/ Modal -->


        <!-- Modal -->
        <div class="modal fade" id="evaluateConfirmationModal" tabindex="-1" role="dialog" 
            aria-labelledby="evaluateConfirmationModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        @if($lesson->exam->id > 1)
                            <h5 class="modal-title">Отправить на оценку?</h5>
                        @else 
                            <h5 class="modal-title">Демо экзамен на доступен для проверки</h5>
                        @endif

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        @if($lesson->exam->id > 1)
                            В среднем оценка занимает два рабочих дня. Ваши записи будут отправлены в языковой центр расположенный в  Торонто. 
                            <br/>Так как в субботу и воскресенье офис не работает, заказы отправленные на выходных обрабатываются в понедельник, пожалуйста учитывайте это при заказе отчёта. 
                            <br/> После окончания проверки вам будет выставлен балл примерно такой же какой бы вы получили при прохождении настоящего экзамена IELTS.
                             <br/><br/>
                            <h4>Стоимость оценки составляет {{ env('EVALUATION_COST') }}р.</h4>
                        @else 
                            Так как демо экзамен состоит только из нескольких вопросов первой части IELTS Speaking Test, он не доступен для отправки на проверку. <br/>
                            Для того чтобы заказать отчёт, вам сначала нужно пройти <a href='/subscriptions'>любой из полных экзаменов</a>.<br/>
                            Спасибо за подготовку к IELTS с нами.
                        @endif

                    </div>
                    <div class="modal-footer">
                        @if($lesson->exam->id > 1)
                            <a href="/evaluate/{{ $lesson->id }}" class="btn btn-success">
                                <i class="far fa-share-square"></i> &nbsp;Послать на оценку
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/ Modal -->

</div>


@endsection