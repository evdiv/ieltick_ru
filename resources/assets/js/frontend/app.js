
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Vue = require('vue');

import store from '../components/frontend/store/store';
import StripeCheckout from '../components/frontend/CheckoutComponent.vue';
import StripeForm from '../components/frontend/StripeFormComponent.vue';
import Recorder from '../components/frontend/RecorderComponent.vue'; 
import SwitchMode from '../components/frontend/SwitchModeComponent.vue';   
import StudyMode from '../components/frontend/StudyModeComponent.vue';  
import IsStuding from '../components/frontend/IsStudingComponent.vue';  

Vue.component('flash', require('../components/Flash.vue').default);

const app = new Vue({
    el: '#app',
    components: { StripeCheckout, StripeForm, Recorder, SwitchMode, StudyMode, IsStuding},
    store
});