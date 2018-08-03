/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');



window.axios = require('axios');
window.axios.defaults.headers.common = {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};



const Vuex = require('vuex');

window.store = new Vuex.Store({
    state: {
        productsCount: 0,
    },
    mutations: {
        increment(state) {
            return state.productsCount++
        },
        set(state, value) {
            return state.productsCount = value
        },
    }
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('products-component', require('./components/products/ProductsComponent.vue'));
Vue.component('add-btn-products-component', require('./components/products/AddToCartComponent.vue'));
Vue.component('products-counter-component', require('./components/cart/CounterComponent.vue'));
Vue.component('products-in-cart-component', require('./components/cart/ProductsInCartComponent.vue'));
Vue.component('change-status-category-component', require('./components/category/StatusComponent.vue'));
Vue.component('change-status-subcategory-component', require('./components/subcategory/StatusComponent.vue'));
Vue.component('select-countries', require('./components/custom/CountryComponent.vue'));
Vue.component('feature-products-component', require('./components/products/FeatureProductsComponent.vue'));
Vue.component('price-specifics-component', require('./components/products/PriceSpeceficComponent.vue'));
Vue.component('category-edit-component', require('./components/products/CategoryEditComponent.vue'));
Vue.component('category-create-component', require('./components/products/CategoryCreateComponent.vue'));
Vue.component('display-product-combination-component', require('./components/products/DisplayProductCombination.vue'));
Vue.component('product-combination-component', require('./components/products/ProductCombinationComponent.vue'));


const app = new Vue({
    el: '#app'
});