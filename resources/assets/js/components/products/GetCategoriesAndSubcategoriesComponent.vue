<template>
    <ul style="margin-left:-35px;">
        <li v-for="(category, index) in categories" :key="index" class="li-category">
            <label>
                <input type="radio" name="category_id" :value="category.id" v-model="categoryindex"> {{ category.name }}
                <a data-toggle="collapse" :href="'#'+category.id" role="button" aria-expanded="false" aria-controls="collapseExample" >
                    <i class="fa fa-chevron-right icon"></i>
                </a>
                <br>
                 <div class="collapse" :id="category.id">
                    <ul>
                        <li class="li-category" v-for="(subcategory, index) in category.sub_categories" :key="index">
                            <label><input type="checkbox" name="subcategory_id[]" v-model="subcategories" :value="subcategory.id"> {{ subcategory.name }}</label>
                        </li>
                    </ul>
                 </div>
            </label>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'CategoryComponent',
    data(){
        return{
            categories:[],
            subcategories:[]
        }
    },
    
    props:['categoryindex', 'productid'],

    mounted(){
        axios.get('/admin/categories/get-category/').then((response) => {
            this.categories = response.data.categories;
        });

        if(this.productid){
            axios.get(`/admin/subcategories/get-subcategory-product/${this.productid}`).then((response)=> {
                this.subcategories = response.data.product;
            });
        }
    }
}
</script>

<style>
.li-category{
    list-style: none;
}

.icon{
    color:black;
    font-size: 10pt;
}

</style>

