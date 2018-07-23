<template>
    <div class="row" style="margin-top:30px;">
      <div class="col-xs-12 col-sm-8">
        <div class="card card-default">
          <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-4">
                  <label>Color</label>
                  <input type="text" class="form-control" disabled v-model="attribute_product.color"/>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <label>Combinaciones</label>
                  <input type="text" class="form-control" disabled  v-model="data"/>
                </div>
                <div class="col-xs-12 col-sm-4" style="margin-top:30px">
                    <button type="button" :disabled="validated ? false:true" class="btn btn-info" @click="createCombination"> <i class="fa fa-cogs"></i> Generar combinación</button>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="card card-default">
            <div class="card-header">
                <p>Valores</p>
            </div>
            <div class="card-body">
                <div v-for="(attribute, index) in attributes" :key="index">
                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h5 style="font-size:12pt" class="mb-0">
                            {{attribute.name}}
                            <a class="pull-right" data-toggle="collapse" :href="'#collapese'+attribute.name" role="button" aria-expanded="false" aria-controls="collapseExample">
                              <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </a>
                          </h5>
                        </div>
                        <div :id="'collapese'+attribute.name" :class="[index == 0 || index == 1 ?  'collapse show' : 'collapse']"  aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                               <div v-for="(detail, index) in attribute.attribute_details" :key="index" :value="detail.name">
                                 <div v-if="detail.hexa != null">
                                    <span style="padding:10px;"><input type="radio" :name="attribute.name" @click="fillCombination(detail.name, detail.hexa)" :value="detail.name" /> {{detail.name}}</span>
                                    <div :style="{ width: '20px', height: '20px', background: detail.hexa, float: 'left', border:'1px solid gray'  }"></div>
                                 </div>
                                 <div v-else>
                                   <input type="checkbox"  :disabled="validated ? false:true" @change="fillValues(data)" v-model="data"  name="values" :value="detail.name" /> {{detail.name}}
                                   
                                 </div>
                              </div>
                          </div>
                        </div>
                      </div>
                   </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</template>


<script>
export default {
  name: "ProductCombinationComponent",
  data() {
    return {
      attributes: [],
      validated: false,
      attribute_product: [],
      values: [],
      data: []
    };
  },
  mounted() {
    axios.get(`/api/attributes`).then(response => {
      this.attributes = response.data.attributes;
    });
  },
  methods: {
    fillCombination(value, hexadecimal) {
      this.validated = true;
      let data_value = this.values;

      this.attribute_product = {
        color: value,
        hexa: hexadecimal
      };
    },
    fillValues(data) {
      let new_data = { data };
      this.values = new_data;
    },
    createCombination() {
      let attributeProduct = this.attribute_product;
      let values = this.values;

      let concat = Object.assign({}, attributeProduct, values);

      console.log(concat);
    }
  }
};
</script>



