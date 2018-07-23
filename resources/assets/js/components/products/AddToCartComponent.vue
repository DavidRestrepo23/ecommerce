<template>
    <button @click="addProductInCart(product)" class="btn btn-success">{{ mesagge }}</button>
</template>

<script>
    import CartMixins from '../mixins/cart';
    export default {
        name:'AddToCartComponent',
        mixins:[CartMixins],
       data(){
           return{
                mesagge: 'Agregar al carrito',
           }
       },
       props:[
           'product'
       ],
    }
</script>
