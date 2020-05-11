<template>
     <div v-if="isStudyMode" class="col-sm-3 d-sm-none d-md-block"> </div>
     <div v-else> </div>
</template>

<script>
    import store from './store/store';

	export default {
		data() {
			return {
			}
        },
        
        computed: {
            isStudyMode () {
                return this.$store.getters.studyMode
            }
        }
	} 
</script>