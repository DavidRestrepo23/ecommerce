export default{
    methods:{
        addProductInCart(productId){
            axios.post('/shopping_cart/add',{
                product_id : productId
            }).then((response)=>{
               let count = response.data.count;
               window.store.commit('set', count);
            });
        }
    }
}

