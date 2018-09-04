
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import SearchResult from './components/search-result.vue';

// This is the component for the search results
Vue.component('search-result', {
    template: `
    <div class="row">
        <div class="col-md-3">
            <img :src="picture" :alt="name" class="img-fluid">
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-9 p-2">
                    <h3><a href="#">{{ name }} </a></h3>   
                    {{ rating }}<br />
                </div>
                <div class="col-md-3 p-2">
                    <p>{{ phone }}</p>
                    <p>{{ address1 }}</p>
                    <p>{{ city }}, {{ state }}</p>
                </div>
            </div>
        </div>
    </div>
    `,
    props: {
      name: { required: true },
      picture: { required: true },
      rating: { required: true },
      phone: { required: true },
      address1: { required: true },
      city: { required: true },
      state: { required: true }
    }
});

app = new Vue({
    el: '#app'
});
