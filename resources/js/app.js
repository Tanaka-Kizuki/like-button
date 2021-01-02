require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('like-component', require('./components/LikeComponent.vue').default);


const app = new Vue({
     el: '#app',
});