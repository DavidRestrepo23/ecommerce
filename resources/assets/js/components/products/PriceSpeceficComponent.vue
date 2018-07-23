<template>
    <div class="form-group">
       <div class="row">
           <div class="col-xs-12 col-sm-12">
               <div class="card">
                   <div class="card-header">
                       Precios Especificos
                   </div>
                   <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                               <th>ID</th>
                               <th>Grupo</th>
                               <th>Precio especifico</th>
                               <th>Descuento</th>
                               <th>Precio final <small>(IVA)</small></th>
                               <th>Editar</th>
                               <th>Eliminar</th>
                           </thead>
                           <tbody>
                                <tr v-for="(product, index) in product_price" :key="index">
                                    <td>{{ product.id }}</td>
                                    <td>{{ product.group.name }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.discount }}</td>
                                    <td>{{ product.price_tax }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" @click="editPrice(product)" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="text-center"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                </tr>
                              
                           </tbody>
                       </table>
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar precio especifico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <label>Precio especifico</label>
                                                <input type="number" v-model="newPrice.price" class="form-control">   
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <label>Impuesto <small>(IVA)</small></label>
                                                <select id="" v-model="newPrice.tax" class="form-control">
                                                    <option value="0">N/A</option>
                                                    <option value="1.19">19%</option>
                                                </select>   
                                            </div>
                                             <div class="col-xs-12 col-sm-4">
                                                <label>Descuento %</label>
                                                <input type="number" v-model="newPrice.discount" class="form-control">                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" @click="savePrice()">Guardar cambios</button>
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
    export default{
        data(){
            return {
                product_price:[],
                disabled: 1,
                groups:[],
                group_actual:0,
                newPrice:{
                    id:'',
                    price:'',
                    price_tax:'',
                    discount:'',
                    tax:'',
                    group_id:'',
                }
            }
        },
        props:['productid'],
        
        methods:{
            getPrice(){
                axios.get(`/api/products/${this.productid}/prices`).then((response) => {
                    this.product_price = response.data.prices;
                    this.groups = response.data.groups;
                }); 
            },
            editPrice(product){
                this.newPrice.id = product.id,
                this.newPrice.price = product.price;
                this.newPrice.price_tax = product.price_tax;
                this.newPrice.discount = product.discount;
                this.newPrice.group_id = product.group_id;
            },
            savePrice(){
                axios.put(`/api/update/${this.newPrice.id}/product-price-specifics/`, {
                    price : this.newPrice.price,
                    tax: this.newPrice.tax,
                    discount: this.newPrice.discount,

                }).then((response) => {
                    $.notify({message: 'Precio actualizado con éxito'},{type: 'success'});
                    this.getPrice();
                })
            }
            
        },
        mounted(){
             this.getPrice();
        },
    }
</script>