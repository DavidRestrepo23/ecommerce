<template>
   <div>
        <select name="country" id="country" v-model="supplier" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
            <option :value="supplier" selected="selected">{{ supplier }}</option>
            <option v-for="(country, index) in countries" :key="index" :value="country.name">{{ country.name }}</option>
        </select>
   </div>
</template>

<script>
export default {
    name:'ContryComponent',
    data(){
        return{
            countries:[],
        }
    },
    props:['supplier'],
    mounted(){
        axios.get('/json/countries.json').then((response) => {
           this.countries = response.data
        });
    },
   
}
</script>
