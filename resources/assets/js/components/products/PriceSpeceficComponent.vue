<template>
    <div>
        <div class="card">
            <div class="card-header">Precios especificos</div>
            <div class="card-body">
                <div class="callout callout-info">
                    <i class="fa fa-info-circle"></i> Puedes establecer precios específicos para clientes de diferentes grupos.
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>¿Para que grupo?</label>
                            <select  v-model="values.group_id" class="form-control" id="">
                                <option v-for="(group, index) in groups_list" :key="index" :value="group.id">{{ group.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>Precio especifico</label>
                            <input type="number" v-model="values.price_specific" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>¿Este precio lleva descuento?</label>
                            <input type="number" v-model="values.discount" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>¿Este precio lleva impuesto?</label>
                            <select  v-model="values.tax" class="form-control" id="">
                                <option value="0">N/A</option>
                                <option value="1.19">19%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2" style="margin-top:30px">
                        <div class="form-group">
                            <button type="button" class="btn btn-info" @click="savePrices()"><i class="fa fa-plus-circle"></i> Crear precio especifico</button>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
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
                               <th>Precio final <small>(Impuestos incluidos)</small></th>
                               <th>Eliminar</th>
                           </thead>
                           <tbody>
                                <tr v-for="(price, index) in product_prices" :key="index">
                                    <td>{{ price.id }}</td>
                                    <td>{{ price.group }}</td>
                                    <td>{{ price.humanPrice }}</td>
                                    <td>{{ price.discount }}</td>
                                    <td>{{ price.humanTax }}</td>
                                    <td class="text-center"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
    </div>
    
</template>

<script>
export default {
    name:'PriceSpecificsComponent',
    data(){
        return{
            values:{
                group_id:0,
                price_specific:0,
                discount:0,
                tax:0,
            },
            groups_list:[],
            endpoint:'/admin/prices',
            product_prices:[],
            
        }
    },
    props:['groups','productid'],
    mounted(){
        this.groups_list = this.groups;
        this.getPrice();
    },
    methods:{
        savePrices(){
            let price = this.values.price_specific;
            let price_tax = this.values.tax;
            let discount = this.values.discount;
            let price_total = 0;
            price_total = (price - (price * discount) / 100); 
            if(price_tax != 0){
                price_total = price_total * price_tax;
            } 
            if(price == 0)
                return $.notify({message: 'El precio debe ser mayor a 0'},{type: 'danger'});
            

            if(this.values.group_id == 0)
                return $.notify({message: 'Debes seleccionar un grupo'},{type: 'danger'});

              axios.post(this.endpoint,{
                        group_id:this.values.group_id,
                        price:this.values.price_specific,
                        price_tax:price_total,
                        discount:this.values.discount,
                        product_id:this.productid,
                    }).then(response=>{
                    if(response.data.response == 'error'){
                        return $.notify({message: 'Ya existe un precio especifico para estos parametros'},{type: 'danger'});
                    }
                    
                    $.notify({message: 'Precio especifico creado con éxito'},{type: 'success'});
                    this.getPrice();
                });
            },
            getPrice(){
                axios.get(`/admin/prices/${this.productid}`).then((response) => {
                    this.product_prices = response.data.prices.data;
                }); 
            },
    }
}
</script>

