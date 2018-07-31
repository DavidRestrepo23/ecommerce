<template>
    <div class="row" style="margin-top:30px;">
      <div class="col-xs-12 col-sm-8">
        <div class="callout callout-info">
            <p>
              <b> <i style="color:#117A8B" class="fa fa-info-circle"></i> Para crear los atributos y valores puedes ir menú y seleccionar <a href="/admin/attributes" target="_blank" style="color:black">Atributos</a>.</b> <br>
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
                        <th style="font-size:11pt;">Combinación</th>
                        <th style="font-size:11pt;">Cantidad</th>
                        <th style="font-size:11pt;">Referencia</th>
                        <th style="font-size:11pt;">Precio Base</th>
                        <th style="font-size:11pt;">Impacto en el precio</th>
                        <th style="font-size:11pt;">Editar</th>
                        <th style="font-size:11pt;">Elimnar</th>
                    </thead>
                    <tbody>
                        <tr v-for="(combination, index) in product_combinations" :key="index">
                            <td>{{ index+1 }}</td>
                            <td>{{ combination.combination }}</td>
                            <td>{{ combination.stock }}</td>
                            <td>{{ combination.reference }}</td>
                            <td>{{ combination.humanPrice }}</td>
                            <td>{{ combination.price_tax != 0 ? combination.humanPriceTax : combination.humanPrice }}</td>
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
                        <div class="callout callout-info">
                          <p>
                              <i style="color:#117A8B" class="fa fa-info-circle"></i>
                              El campo <b>Referencia</b> puede quedar vacio, este campo se usa si determinada prenda en el color "Rojo" por ejemplo tiene
                              una referencia distinta.
                              <br>
                              El campo <b>Precio</b> se usa si una combinación en particular es más barata o cara, puedes dejar este campo vacio
                              ya que tomara el precio base del producto que se especifico a la hora de crear el producto. 
                          </p>
                      </div>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" @click="updateCombination()">Guardar cambios</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="card">
          <div class="card-header">Selecciona la imagenes para cada grupo de combinaciónes</div>
            <div class="card-body">
              <div class="callout callout-info">
                  <p>
                    <i style="color:#117A8B" class="fa fa-info-circle"></i> Antes de poder seleccionar las imagenes es necesario crear al menos una combinación, una vez 
                    hayas creado, puedes seleccionar <b>un grupo de colores</b> y añadir sus respectivas imagenes, una vez hecho esto pulsa <b>Guardar combinación</b>
                  </p>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                            <label>Selecciona un grupo de colores</label>
                            <select name="" class="form-control" v-model="group_combinations_id" @change="fillGroupCombinationsImages()"  id="">
                                <option v-for="(group_combination, index) in group_combinations_color" :key="index" :value="group_combination.id">{{ group_combination.color }}</option>
                            </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-2 text-center" v-for="(image, index) in product_images" :key="index">
                        <label class="btn btn-default"> 
                          <img :src="'/images/products/'+image.url" width="80" class="img-check">
                          <input  type="checkbox" :disabled="validated_images ? false:true" v-model="images_selected" id="item4" :value="image.url" class="hidden" autocomplete="off">
                        </label>
                       
                    </div>
                  </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                          <button type="button" :disabled="validated_images ? false:true" @click="saveImagesCombination(group_combinations_id)" class="btn btn-info pull-right"> <i class="fa fa-save"></i> Guardar combinación</button>
                        </div>
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
      validated_images: false,
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
      },
      group_combinations_color:[],
      group_combinations_id:null,
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

    /** Get Group Combinations */
    this.getGroupCombination();
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
      axios.post('/admin/combinations', {
        productId: this.productid,
        combinations: combinations,
        key_color: this.attribute_product.color,
        images: this.images_selected  
      }).then(response => {
        if(response.data.response == 'Error'){
          $.notify({message: 'Esta combinación ya existe'},{type: 'danger'});
        }else{
          $.notify({message: 'Combinación creada con éxito'},{type: 'success'});
          
            this.combinations = [];
            this.data=[];
            this.attribute_product.color = [];
            this.images_selected = [];  
            this.validated = false;
            
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
      });
    },
    editCombination(combination){
      this.combination_edit.id = combination.id;
      this.combination_edit.reference = combination.reference;
      this.combination_edit.stock = combination.stock;
      this.combination_edit.price = combination.price;
      this.combination_edit.price_tax = 0;
      this.combination_edit.discount = 0;
      
    },
    updateCombination(){
      let price = this.combination_edit.price;
      let price_tax = this.combination_edit.price_tax;
      let discount = this.combination_edit.discount;
      let price_total = 0;
      
      price_total = (price - (price * discount) / 100); 

      if(price_tax != 0){
          price_total = price_total * price_tax;
      } 

      axios.put(`/admin/combinations/${this.combination_edit.id}`,{
        id:this.combination_edit.id,
        reference:this.combination_edit.reference,
        stock:this.combination_edit.stock,
        price:this.combination_edit.price,
        price_tax:price_total,
        discount:this.combination_edit.discount,
      }).then(response=>{
          $.notify({message: 'Combinación editada con éxito'},{type: 'success'});
          this.getAllCombinations();
      }).catch(errors => {
        $.notify({message: errors.response.data.errors.reference[0]},{type: 'danger'});
      })
    },
    getGroupCombination(){
      this.validated_images = true;
      axios.get(`/api/group-combinations/${this.productid}`).then(response=>{
        this.group_combinations_color = response.data.group_combinations;
      });
    },
    saveImagesCombination(group_combinations_id){
        if(this.images_selected.length == 0)
          return $.notify({message: 'Debes seleccionar al menos una imagen'},{type: 'danger'});
       
        if(group_combinations_id == null)
          return $.notify({message: 'Debes seleccionar al menos un grupo de color'},{type: 'danger'});  

        axios.post(`/admin/group-combinations-images`,{
            _images:this.images_selected,
            _group_combination_id:group_combinations_id,
        }).then(response => {
            $.notify({message: 'Combinación editada con éxito'},{type: 'success'});
        }).catch(errors => {
          $.notify({message: errors.response.data.errors._images[0]},{type: 'danger'});
        });
    },
    fillGroupCombinationsImages(){
      axios.get(`/admin/group-combinations-images/${this.group_combinations_id}`).then(response => {
        this.images_selected = response.data.images;
        
      })
    },
    
  }
};
</script>

