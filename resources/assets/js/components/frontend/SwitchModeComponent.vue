<template>
    <span>
        <toggle-button 
            :value="studyMode" 
            :width=90 
            :labels="{checked: 'Обучение', unchecked: 'Экзамен'}"
            @change="toggleStudyMode"/>

    </span>
</template>

<script>
    import store from './store/store';
    import { ToggleButton } from 'vue-js-toggle-button'

	export default {
		data() {
			return {
			}
        },
        
        computed: {
            studyMode() {
                return this.$store.getters.studyMode
            }
        },

        methods: {
            toggleStudyMode(val) {
                this.$store.commit('studyMode', val.value)
            }
        },

        components: { ToggleButton }
	}
</script>