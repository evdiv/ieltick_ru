<template>
    <div class="col-sm-12"> 


        <div v-if="$store.getters.examEnded" class="row justify-content-center">
            <div class="col-sm-12 text-center">

                <div style="margin-bottom: 20px;">
                    <i class="fas fa-spinner fa-spin fa-6x"></i>
                </div>
                <div class="alert alert-success">
                    Вы успешно прошли этот экзамен!<br/>
                    Сейчас вы сможете отправить пройденный экзамен для оценки IELTS экзаменатору или пройти этот экзамен ещё раз.
                </div>
            </div>
        </div>  


        <div v-else>
            <div class="row">
                <div class="col">
                    <Player :url='src'></Player>
    
                    <div style="margin-top: -60px; margin-left: 15px;">
                        <button v-if='!examStarted' data-toggle="modal" 
                                data-target="#takeExamConfirmation" 
                                class="btn btn-info"><i class="fas fa-play-circle fa-lg"></i> &nbsp;Начать
                        </button>


                        <span v-if='examPlaying' class="btn btn-success" style="padding: 6px 10px;">

                            <span v-if='showStopWatch'> 
                                <i class="fas fa-stopwatch fa-lg"></i>
                            </span>
                            <span v-else>
                                <i class="blink fas fa-play-circle recorder-icon"></i> 
                                <span class="recorder-label"> &nbsp;Воспроизведение</span>
                                <span style="font-size: 10px; display: block;">Пожалуйста слушайте экзаменатора</span>
                            </span>
                        </span>

                        <span v-if='showStopWatch'> 
                            <div style="margin-bottom: 14px;">&nbsp;</div>
                        </span>


                        <span v-if='isRecording' class="btn btn-sm btn-danger" style="padding: 6px 10px;">
                            <i class="blink fas fa-microphone recorder-icon"></i> 
                            <span class="recorder-label"> &nbsp;Запись ответа</span>
                            <span v-if='recError' style="font-size: 10px; display: block;">Recording</span>
                            <span v-else style="font-size: 10px; display: block;">Mic: {{ volume }}, time: {{ recordedTime }}</span>
                        </span>

                        <span v-if='isRecording' class="btn btn-sm btn-success" @click="goToNextQuestion">
                            <i class="fas fa-step-forward"></i> 
                            <span class="recorder-label"> &nbsp;</span>
                            <span style="font-size: 10px; display: block;">Далее</span>
                        </span>
                    </div>

                </div>

                <div v-if="isStudyMode" class="col-sm-12 col-md-3 study-mode-window"> 
                    <slot></slot>
                </div>

            </div>    
            
            <!--           
            <small>Current time: {{ currentTime }} </small> <br/>
            <small>Debug Msg:  {{ debugMsg }}</small><br/>
            <small>recorder Error: {{recError}}  | demo {{ demo }}</small><br/>
            <small>is Recording: {{  isRecording }}</small><br/>
            <small>is Pause {{ isPause }} </small><br/>
            <small>Next interval {{ intervals[0] }}</small><br/>
            <small>exam Playing {{ examPlaying }}</small><br/>
            <small>response MaxTime {{ responseMaxTime }}</small><br/>
            <small>recorder duration: {{ rawRecorderDuration }}</small><br/>
            <small>delay Time: {{ delayTime }}</small><br />
            <small>voice Recorded: {{ voiceRecorded }}</small><br />
            -->

            <!-- Modal -->
            <div class="modal fade" id="takeExamConfirmation" tabindex="-1" role="dialog" 
                aria-labelledby="takeExamConfirmation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Начать экзамен?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <i class="fas fa-microphone-alt fa-lg text-mutted"></i> &nbsp;Пожалуйста убедитесь, что ваш микрофон работает и вы находитесь в тихой обстановке.
                            <br/>
                            Вы в любой момент можете остановить или перезапустить экзамен.
                        </div>
                        <div class="modal-footer">

                            <button @click="startExam" data-dismiss="modal" class="btn btn-info btn-lg">
                                <i class="fas fa-play-circle fa-lg"></i> Начать экзамен
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ Modal -->

            <!-- Modal -->
            <div class="modal fade" id="cancelExamConfirmation" tabindex="-1" role="dialog" 
                aria-labelledby="cancelExamConfirmation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Отменить экзамен?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            Вы хотите выйти из экзамена?<br/>
                            Если вы выйдите из экзамена, ваши записи будут стёрты, но вы сможете его пройти повторно в любое другое время.
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <a href="/lessons" v-if='examStarted' class="btn btn-danger btn-lg">
                                <i class="fas fa-stop-circle fa-lg"></i> Выйти из экзамена
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ Modal -->

        </div>

    </div>
</template>

<script>
    import Player from './PlayerComponent';
    import Recorder    from './lib/recorder';
    import { convertTimeMMSS }  from './lib/utils';
    import store from './store/store';

    export default {
        props: ['id', 'demo', 'src', 'intervals-str', 'firstPartEnd', 'secondPartStart', 'length'],
        data () {
            return {
                recorder    : new Recorder({
                                afterStop: () => {
                                  this.recordList = this.recorder.recordList();
                                  if (this.stopRecord) {
                                    this.stopRecord('stop record');
                                  }
                                }

                              }),

                muteTimer : undefined,
                muteDetected: false,
                recordList    : [],
                selected      : {},
                uploaderOptions : {},
                responseMaxTime: 100, 
                recorderTreshold: 3,
                delayTime: 10000,
                showStopWatch: 0,
                debugMsg: ''
            }
        },

        computed: {
            iconButtonType () {
                return this.isRecording && this.isPause ? 'mic' : this.isRecording ? 'pause' : 'mic'; 
            },
            intervals() {
                return this.intervalsStr.split(",");
            },
            currentTime() {
                return this.$store.getters.currentTime;
            },
            examStarted() {
                return this.$store.getters.examStarted;
            },
            examPlaying () {
                return (this.$store.getters.examStarted && !this.$store.getters.examPaused);
            },
            isPause () {
                return this.recorder.isPause;
            },
            isRecording () {
                return this.recorder.isRecording;
            },
            isStudyMode () {
                return this.$store.getters.studyMode;
            },
            recordedTime () {
                if ((parseInt(this.recorder.duration) > this.recorderTreshold) && this.recorder.duration >= this.responseMaxTime) {

                    this.debugMsg += "resume exam | ";

                    this.stopRecorder();
                    this.resumeExam();
                }
                return convertTimeMMSS(this.recorder.duration); 

            },
            rawRecorderDuration() {
                return this.recorder.duration;
            },

            volume () {
                if(this.recorder.duration > 3 && this.recorder.duration > (this.delayTime / 1000)) {
                    
                    this.detectMute();
                }
                return parseFloat(this.recorder.volume);
            },

            recError() {
                return this.$store.getters.voiceRecorderError;
            },

            voiceRecorded() {
                if(this.recError !== 0 || this.demo > 0) { 
                    return;
                } 
                return true;
            }

        },
        watch: {
            currentTime(val) {

                if( val >= this.length) {
                    this.stopRecorder();
                    this.endExam();
                    return; 
                }

                // Display a stopwatch instead of play button
                if(val > this.firstPartEnd && val < this.secondPartStart ) {

                    this.showStopWatch = 1;
                } else {
                    this.showStopWatch = 0;
                }

                if(val == this.intervals[0]) {


                    //For studyng mode increase response time to two minutes
                    if(this.isStudyMode) {

                        this.responseMaxTime = 110; 
                        this.delayTime = 10000;

                    } else if(parseInt(this.intervals[0]) <= 350) {   
                        //console.log("introdution")  
                        this.responseMaxTime = 5;
                        this.delayTime = 3000;

                    } else if(parseInt(this.intervals[0]) == this.secondPartStart) {
                        //console.log("second part")
                        this.responseMaxTime = 110;
                        this.delayTime = 10000;

                    } else if(parseInt(this.intervals[0]) > this.secondPartStart) {
                        //console.log("third part")
                        this.responseMaxTime = (this.$store.getters.studyMode) ? 45 : 28;
                        this.delayTime = 5000;

                    } else {
                        //console.log("first part")
                        this.responseMaxTime = (this.$store.getters.studyMode) ? 45 :  18;
                        this.delayTime = (this.$store.getters.studyMode) ? 5000 :  3000;
                    }

  
                    this.pauseExam();
                    this.intervals.splice(0, 1);

                    this.startRecorder();
                
                } else if(val > this.intervals[0]){
                    this.intervals.splice(0, 1);
                }
            }
        },

        methods: {
            startRecorder () {
                if (!this.isRecording || (this.isRecording && this.isPause)) {
                    this.recorder.start();

                    if(this.recorder.voiceRecorderError){
                        this.$store.commit('voiceRecorderError', 1);
                    }
                } 
            },

            pauseRecorder() {
                this.recorder.pause();
            },

            stopRecorder() {
                if (!this.isRecording) { 
                  return;
                }

                this.debugMsg += "in the stop recorder function | ";
                this.recorder.stop();
                
                if(this.voiceRecorded){
                    this.upload();
                }
            },

            async upload() {

                let record = this.recordList.shift();

                let data = new FormData()
                data.append('audio', record.blob, 'my-record')

                let settings = { headers: { 'content-type': 'multipart/form-data' } } 

                return await axios.post('/records/' + this.id, data, settings)
                .then((response) => {
                    //console.log(response)
                })
                .catch((error) => {
                    //console.log(error)
                });
            },


            startExam() {
                this.$store.commit('examStarted', true)
            },

            resumeExam() {
                this.recorder.duration = 0; // test this
                this.$store.commit('examResumed', true)
            },

            pauseExam() {
                this.$store.commit('examPaused', true)
            },
               
            endExam() {
                axios.post('/lessons/' + this.id, {
                    completed: 1,
                    'voice': this.voiceRecorded ? 1 : 0,
                    '_method' : 'PATCH'
                }).then(() => {

                    this.$store.commit('examEnded', true) 
                    location.reload() 
                })
            },

             detectMute() {

                //console.log("detectiong mute")
                if(!this.recorder.isRecording || (parseInt(this.recorder.duration) < this.recorderTreshold)) {

                    this.debugMsg += "hit detect mute first condition | ";
                    return
                }

                if(this.recorder.volume > 0 && typeof this.muteTimer != 'undefined') {
                    clearTimeout(this.muteTimer)
                    
                    this.muteTimer = undefined;
                    this.debugMsg += "clearing timeout. | ";
                
                } else if(this.recorder.volume == 0 && typeof this.muteTimer == 'undefined') {

                    if(this.muteDetected) {
                        return;
                    } else {
                        this.muteDetected = true;
                    }

                    this.debugMsg += "setting timeout. will be waiting for " + this.delayTime + "sec | ";

                    this.muteTimer = setTimeout(() => {
                        this.stopRecorder();
                        this.resumeExam();
                        this.muteDetected = false;

                        this.debugMsg += "exceeding delay timeout. Recording stopped | ";

                    }, this.delayTime)

                } 
            },

            goToNextQuestion() {

                this.stopRecorder();
                this.resumeExam();
            }
        },

        beforeDestroy () {
          this.stopRecorder();
        },
        components: { Player }
    }
</script>

<style>
    .exam-start-btn {
        font-size: 28px;
    }
    .blink{
        animation: blink 1s ease-in-out infinite;
    }

    @keyframes blink{
        0%{opacity: 0;}
        50%{opacity: .5;}
        100%{opacity: 1;}
    }

    @media screen and (max-width: 768px) {
        .exam-start-btn {
            font-size: 22px;
        }
    }
</style>