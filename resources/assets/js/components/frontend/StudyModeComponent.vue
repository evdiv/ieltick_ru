<template>
    <div>
        <div v-if="!vocabularyReceived">
            <h3 class="phrase-placeholder">Здесь будут показаны слова и выражения  <br/>
            которые вы можете использовать в ответах</h3> 
        </div>

        <div v-else>
            <span v-if="currentPhrase" class="phrase-label">Possible lead-in phrase:</span>
            <div v-if="currentPhrase" class="relevant-lead-in-phrase" v-html="currentPhrase">{{ currentPhrase }}</div>

            <!-- <h5 class="phrase-label">Uncommon vocabulary relevant to the topic</h5> -->
            
            <div v-if="currentNouns.length > 0" class="phrase-label">Nouns: </div>
            <span class="relevant-phrase" v-for="noun in currentNouns">
                {{ noun }}
            </span>

            <div v-if="currentVerbs.length > 0" class="phrase-label">Verbs: </div>
            <span class="relevant-phrase" v-for="verb in currentVerbs">
                {{ verb }}
            </span>

            <div v-if="currentAdjectives.length > 0" class="phrase-label">Adjectives: </div>
            <span class="relevant-phrase" v-for="adjective in currentAdjectives">
                {{ adjective }}
            </span>        

            <!--
            <div class="phrase-label">Idioms: </div>
            <span class="relevant-phrase relevant-idiom" v-for="idiom in currentIdioms">
                {{ idiom }}
            </span>
            -->    
        </div>

    </div>
</template>

<script>
    import store from './store/store';

	export default {
		props: ['firstPartEnd', 'phrases', 'nouns', 'verbs', 'adjectives', 'idioms'],
		data() {
			return {
                phraseHidden: false,
                vocabularyReceived: false,
                currentPhrase: '',
                currentNouns: [],
                currentVerbs: [],
                currentAdjectives: [],
                currentIdioms: [] 
			}
		},

        computed: {

            examResumed() {
                return this.$store.getters.examResumed;
            },

            examPaused() {
                return this.$store.getters.examPaused;
            },
            currentTime() {
                return this.$store.getters.currentTime;
            }
        },

        methods: {
            showPhrase() {
                this.phraseHidden = false;
            },

            hidePhrase() {
                this.phraseHidden = true; 
            },

            getPhrase() {

                let data = JSON.parse(this.phrases).filter((el) => {
                    return el.interval === this.$store.getters.currentTime;
                })  

                if(data.length > 0) {
                    this.currentPhrase = data[0].phrase;
                    this.vocabularyReceived = true;
                }
            },

            getDebugContent() {
                this.currentNouns = [];
                let data = JSON.parse(this.nouns); 

                data.forEach((el) => {
                    this.currentNouns.push(el.noun) 
                });

                if(this.currentNouns.length > 0) {
                    this.vocabularyReceived = true;
                }
            },

            getNouns() {
                this.currentNouns = [];
                let data = JSON.parse(this.nouns).filter((el) => {
                    return el.start <= this.$store.getters.currentTime && el.stop > this.$store.getters.currentTime
                })  

                data.forEach((el) => {
                    this.currentNouns.push(el.noun) 
                });

                if(this.currentNouns.length > 0) {
                    this.vocabularyReceived = true;
                }
            },

            getVerbs() {
                this.currentVerbs = [];
                let data = JSON.parse(this.verbs).filter((el) => {
                    return el.start <= this.$store.getters.currentTime && el.stop > this.$store.getters.currentTime
                })  

                data.forEach((el) => {
                    this.currentVerbs.push(el.verb)
                });

                if(this.currentVerbs.length > 0) {
                    this.vocabularyReceived = true;
                }                
            },

            getAdjectives() {
                this.currentAdjectives = [];
                let data = JSON.parse(this.adjectives).filter((el) => {
                    return el.start <= this.$store.getters.currentTime && el.stop > this.$store.getters.currentTime
                })  

                data.forEach((el) => {
                    this.currentAdjectives.push(el.adjective)
                });
            },

            getIdioms() {
                this.currentIdioms = [];
                let data = JSON.parse(this.idioms).filter((el) => {
                    return el.start <= this.$store.getters.currentTime && el.stop > this.$store.getters.currentTime
                })  

                data.forEach((el) => {
                    this.currentIdioms.push(el.idiom)
                });
            }         
        },

        watch: {

        	examResumed(val) {
                if(val) {
                    this.currentPhrase = '';
                    if(parseInt(this.$store.getters.currentTime * 0.1) === parseInt(this.firstPartEnd * 0.1)) {

                        this.currentNouns = [];
                        this.currentVerbs = [];
                        this.currentAdjectives = [];
                        this.currentIdioms = [];

                        setTimeout(() => { 
                            this.getPhrase();
                            this.getNouns();
                            this.getVerbs();
                            this.getAdjectives();
                            this.getIdioms();
                            this.currentPhrase = `I’d like to talk about …<br/>
                                    There are many … I could talk about, <br/>but I chose … because …`;
                        }, 18000);
                    }
                } 
        	},

            examPaused(val) {
                if(val) {
                    this.getPhrase();

                    if(this.$store.getters.currentTime === parseInt(this.firstPartEnd)) {
                        return;
                    }

                    this.getNouns();
                    this.getVerbs();
                    this.getAdjectives();
                    this.getIdioms();
                }
            }
        },

        mounted() {
            console.log('Mounted');
            //this.getDebugContent();
        }
	}
</script>

<style>
    h3.phrase-placeholder {
        font-size: 18px;
        margin-top: 14px;
        margin-bottom: 30px;
        text-align:center;
    }
    .phrase-label {
        margin-top: 6px;
        font-size: 12px;
        color: #a9a6a6;
        border-bottom: 1px dotted #cacaca;
    }
    .relevant-lead-in-phrase {
        display: inline-block;
        font-size: 13px;
        color: #fff;
        margin: 4px;
        background-color: #17a2b8;
        padding: 2px 5px;
        margin-top: 9px;
        border-radius: 3px;
    }

    span.relevant-phrase {
        display: inline-block;
        font-size: 13px;
        color: #fff;
        margin: 4px;
        background-color: #666;
        padding: 2px 5px;
        border-radius: 3px;
    }

    @media (max-width: 767px) {
        .phrase-label {
            margin-top: 6px;
        }
    }

</style>