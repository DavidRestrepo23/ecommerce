<template>
    <li class="nav-link"><a href="/cart">Mi carrito {{ productsCount }}</a></li>
</template>


<script>
    export default {
        name: 'CounterComponent',
        props:["count"],
        created() {
            window.store.commit('set', this.count);
        },
        computed:{
            productsCount(){
                return window.store.state.productsCount;
            }
        }
    }
</script>
