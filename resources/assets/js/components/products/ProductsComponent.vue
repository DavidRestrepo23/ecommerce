<template>
    <section>
        <div class="row">
            <div class="col-xs-12 col-sm-4" v-for="(product, index) in products" :key="index" style="margin-bottom:30px">
               <div class="card" style="width: 100%">
                    <img class="card-img-top" v-bind:src="'http://placeimg.com/640/480/tech/sepia'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.title }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                        <hr>
                        <strong>$ {{ product.price / 100}}</strong>
                        <br><br>
                        <add-btn-products-component :product="product.id"></add-btn-products-component>
                        <a :href="'/products/'+product.id" class="btn btn-primary pull-right">Ver producto</a>
                    </div>
               </div>
            </div>
            
        </div>
    </section>
</template>

<script>
import { AddToCartComponent } from "./AddToCartComponent";
export default {
    component:{
        AddToCartComponent
    },
    data(){
        return{
            name:'ProductsComponent',
            products:[],
            endpoint: '/api/products'
        }
    },
    mounted(){
       axios.get(this.endpoint).then((response) => {
            this.products = response.data.products  ;
        });
        
    }
}
</script>
