<template>
    <table class="table table-bordered">
        <thead>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Total</th>
        </thead>
        <tbody>
            <tr v-for="(product, index) in products" :key="index" >
                <td v-text="product.title"></td>
                <td>$ {{ product.price / 100 }} </td>
                <td>{{ product.amount }} <button @click="addProductInCart(product.id)" class="btn btn-warning" style="float:right">+</button>
                                         <button @click="decrementProductInCart(product.id)" class="btn btn-danger" style="float:right">-</button> </td>
                <td> $ {{ product.price * product.amount / 100 }} </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><h5>Subtotal</h5></td>
                <td class="text-right"><strong>{{ total }}</strong></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><h5>Total</h5></td>
                <td class="text-right"><h5><strong>{{ total }}</strong></h5></td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: 'ProductInCartComponent',
        data(){
            return{
                products:[],
                endpoints:'/api/cart/products',
            }
        },
        computed:{
            total(){
                let total = this.products.reduce((acumulator,currentObj)=>{
                    return acumulator + currentObj.price * currentObj.amount;
                }, 0);

                return `$${total/100}`;
            }
        },
        mounted() {
            axios.get(this.endpoints).then((response)=>{
              this.products = response.data.cart;  
           });
        },
        methods:{
            addProductInCart(productId){
                axios.post('/shopping_cart/add',{
                    product_id : productId
                }).then((response)=>{
                    this.products = response.data.cart;  
                });
            },
            decrementProductInCart(productId){
                axios.post('/shopping_cart/decrement',{
                    product_id : productId
                }).then((response)=>{
                    this.products = response.data.cart;
                    const ProductAmount = this.products.findIndex(qty => qty.amount === 0);
                    if(ProductAmount > -1){
                        this.products.splice(ProductAmount, 1);
                    }
                    window.store.commit('set', this.products.length);
                    
                });
            },
            
        }
    }
</script>
