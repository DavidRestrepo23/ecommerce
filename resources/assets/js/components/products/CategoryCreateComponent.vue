<template>
    <ul style="margin-left:-35px;">
        <li v-for="(category, index) in categories" :key="index" class="li-category">
            <label>
                <input type="radio" name="category_id" :value="category.id"> {{ category.name }} 
                <a data-toggle="collapse" :href="'#'+category.id" role="button" aria-expanded="false" aria-controls="collapseExample" >
                    <i class="fa fa-chevron-right icon"></i>
                </a>
                <br>
                <div class="collapse" :id="category.id">
                    <ul>
                        <li class="li-category" v-for="(subcategory, index) in category.sub_categories" :key="index">
                            <label><input type="checkbox" name="subcategory_id[]" :value="subcategory.id"> {{ subcategory.name }}</label>
                        </li>
                    </ul>
                </div>
            </label> 
        </li>
    </ul>
</template>

<script>
export default {
    name: 'CategoryCreateComponent',
    data(){
        return{
            categories:[],
        }
    },
    mounted(){
        axios.get('/api/category/get-category').then((response) => {
            this.categories = response.data.categories;
        });  
    },
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

