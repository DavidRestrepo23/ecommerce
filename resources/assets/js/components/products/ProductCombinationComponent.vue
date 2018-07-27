<template>
    <div class="row" style="margin-top:30px;">
      <div class="col-xs-12 col-sm-8">
        <div class="callout callout-info">
            <p>
              <b>Para crear los atributos y valores puedes ir menú y seleccionar <a href="/admin/attributes" target="_blank" style="color:black">Atributos</a>.</b> <br>
              Puedes introducir los atributos deseados (tales como "talla" o "color") y sus valores respectivos 
              ("XS", "rojo", etc.) seleccionandolos en la columna derecha. 
              A continuación, puedes seleccionar las imagenes para dicha combinación, posteriormente haz clic en <b>"Generar combinación":</b> ¡automáticamente se crearán todas las combinaciones para ti!
            </p>
        </div>
        <div class="card card-default">
          <div class="card-body">
              <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-xs-12 col-sm-4">
                      <label>Color</label>
                      <input type="text" name="combination" class="form-control" disabled v-model="attribute_product.color"/>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                      <label>Combinaciones</label>
                      <input type="text" class="form-control" disabled  v-model="data"/>
                    </div>                
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">Selecciona la imagenes para esta combinación</div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-xs-12 col-sm-3 col-md-2 text-center" v-for="(image, index) in product_images" :key="index">
                          <label class="btn btn-default">
                            <img :src="'/images/products/'+image.url" width="80" class="img-check">
                            <input :disabled="validated ? false:true"  type="checkbox" v-model="images_selected"  id="item4" :value="image.url" class="hidden" autocomplete="off">
                          </label>
                      </div>
                  </div>
              </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="col-xs-12 col-sm-12 ">
                    <button type="button" :disabled="validated ? false:true" class="btn btn-info pull-right" @click="createCombination"> <i class="fa fa-cogs"></i> Generar combinación</button>
                </div>
              </div>
              </div>
          </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                lista de combinaciones 
            </div>
            <div class="card-body">
             
                <table class="table table-bordered">
                    <thead>
                        <th style="font-size:11pt;">ID</th>
                        <th style="font-size:11pt;">Imagen</th>                        
                        <th style="font-size:11pt;">Combinación</th>
                        <th style="font-size:11pt;">Cantidad</th>
                        <th style="font-size:11pt;">Precio final</th>
                        <th style="font-size:11pt;">Editar</th>
                        <th style="font-size:11pt;">Elimnar</th>
                    </thead>
                    <tbody>
                        <tr v-for="(combination, index) in product_combinations" :key="index">
                            <td>{{ index+1 }}</td>
                            <td class="text-center"><img :src="'/images/products/'+combination.image" width="40" alt=""></td>
                            <td>{{ combination.combination }}</td>
                            <td>{{ combination.stock }}</td>
                            <td>{{ combination.humanPrice }}</td>
                            <td class="text-center"><i  data-toggle="modal" data-target="#exampleModal2" @click="editCombination(combination)" style="cursor:pointer" class="fa fa-pencil"></i></td>
                            <td class="text-center"><i style="cursor:pointer" class="fa fa-trash"></i></td>
                        </tr>
                    </tbody>
                </table>
                 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal2Label">Editar combinación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="card">
                            <div class="card-header">
                              Editar ajustes
                            </div>
                            <div class="card-body">
                              <div class="row">
                            <div class="col-xs-12 col-sm-6">
                              <div class="form-group">
                                <label>Referencia</label> 
                                <input type="text" class="form-control" v-model="combination_edit.reference">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                              <div class="form-group">
                                <label>Cantidad (stock)</label> 
                                <input type="text" class="form-control" v-model="combination_edit.stock">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-4">
                              <div class="form-group">
                                <label>Precio</label>
                                <input type="number" class="form-control" v-model="combination_edit.price">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                              <div class="form-group">
                                <label>Impuesto (IVA)</label>
                                <select name="" class="form-control" v-model="combination_edit.price_tax">
                                    <option value="0">N/A</option>
                                    <option value="1.19">19%</option>
                                </select>
                              </div>
                            </div>
                             <div class="col-xs-12 col-sm-4">
                              <div class="form-group">
                                <label>Descuento</label>
                                <input type="number" class="form-control" v-model="combination_edit.discount">
                              </div>
                            </div>
                          </div>
                            </div>
                          </div>
                          
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
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
                            {{ attribute.name }}
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
                                   <input type="checkbox"  :disabled="validated ? false:true"  v-model="data" @change="fillValues(attribute.name, detail.name)"  name="values" :value="detail.name" /> {{detail.name}}
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
      data: [],
      combinations:[],
      product_combinations:[],
      product_images:[],
      images_selected:[],
      combination_edit:{
          id:'',
          reference:'',
          stock:'',
          price:'',
          price_tax:'',
          discount:'',
      }
    };
  },
  props:['productid'],
  mounted() {
    /** Get All Attributes */
    axios.get(`/api/attributes`).then(response => {
      this.attributes = response.data.attributes;
    });

    /** Get Combinations  */
    this.getAllCombinations();
  },
  methods: {
    fillCombination(value, hexadecimal) {
      this.validated = true;
      this.attribute_product = {
        color: value,
        hexa: hexadecimal
      };
    },
    fillValues(key, value){
      let color = this.attribute_product.color;
      let array = {color,key,value};
      this.combinations.push(array);
    },
    createCombination() {
      let combinations = this.combinations;
      axios.post('/admin/combinations/create', {
        
        productId: this.productid,
        combinations: combinations,
        key_color: this.attribute_product.color,
        images: JSON.stringify(this.images_selected)

      }).then(response => {
        if(response.data.response == 'Error'){
          $.notify({message: 'Esta combinación ya existe'},{type: 'danger'});
        }else{
          $.notify({message: 'Combinación creada con éxito'},{type: 'success'});
            this.combinations = [];
            this.data=[];
            this.attribute_product.color = [];
            this.images_selected = [];
          setTimeout(()=>{
            this.getAllCombinations();
          },2000)
        }
      }).catch(error => {
        let errors = error.response.data.errors;
        $.notify({message: errors.combination[0]},{type: 'danger'});
      });
    },
    getAllCombinations(){
      axios.get(`/api/product/${this.productid}/combinations`).then(response => {
       this.product_combinations = response.data.combinations.data;
       this.product_images = response.data.images;
       console.log(this.product_combinations);
      });
    },
    editCombination(combination){
      this.combination_edit.id = combination.id;
      this.combination_edit.reference = combination.reference;
      this.combination_edit.stock = combination.stock;
      this.combination_edit.price = combination.price;
      this.combination_edit.price_tax = 0;
      this.combination_edit.discount = 0;
    
    }
  }
};
</script>



<style>
  
</style>
