<template>
  <div>
    <div class="card">
      <div class="card-header"><i class="fa fa-star"></i> Características del producto</div>
      <div class="card-body">
        <multiselect  
            v-model="value"
            :options="feature_details" 
            :multiple="true"
            :selected.sync="value"
            :value="feature_details"
            :close-on-select="false" 
            :clear-on-select="false" 
            :hide-selected="true" 
            :preserve-search="true" 
            placeholder="Seleccione" 
            label="name" 
            track-by="id">
        </multiselect>
      </div>
    </div>
    <input type="hidden" name="feature_detail_id[]" v-for="(detail, index) in value" :key="index" :value="detail.id" > 
</div>
</template>
<script>
  import Multiselect  from "vue-multiselect";
  export default {
    components:{Multiselect},
    data () {
      return {
        value: [],
        feature_details:[],
        endpoints: "/api/features/get-features"
      }
    },
    props:['productid'],
    mounted() {
        axios.get(this.endpoints).then(response => {
            let feature_details = response.data.details; 
            feature_details.forEach(element => {
                this.feature_details.push({
                    id:element.id,
                    name:element.name
                });
            });
        });

        /** get details from product - update */
        if(this.productid != null){
          axios
          .get(`/api/product/${this.productid}/feature-details`)
          .then(response => {
            let details = response.data.feature_details;
             details.forEach(data=>{
               this.value.push({
                 id:data.id,
                 name:data.name,
               })
             })
          });
        }
    },
  }
  /** value: [{id:1,name:'Lana'}], */
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>