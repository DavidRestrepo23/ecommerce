<template>
    <div>
        <div>
        <div class="card">
            <div class="card-header">Descuentos</div>
            <div class="card-body">
                <div class="callout callout-info">
                    <i class="fa fa-info-circle"></i> Puedes establecer un descuento para este producto, agrega el porcentaje (%) de descuento. Por ejemplo 10, 15, 20 <br> <i class="fa fa-info-circle"></i> El descuento se aplicara
                    sobre el precio base del producto. <br>  <i class="fa fa-info-circle"></i> Si no deseas el precio base desmarca la casilla <b><em>Mantener precio base</em></b> y agrega un nuevo valor.
                    <br> <i class="fa fa-info-circle"></i> El campo <b><em>Fecha inicio/Finaliza</em></b> indica el día y la hora en que se aplicara el descuento.
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" name="price_promotion" :disabled="validated" :value="validated ? priceBase : 0" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <label>
                            <input type="checkbox" :checked="validated" v-model="validated" name="" id=""> Mantener precio base
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>Aplica un descuento de:</label>
                            <input type="number" name="discount" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>¿Este precio lleva impuesto?</label>
                            <select name="tax" class="form-control" id="">
                                <option value="0">N/A</option>
                                <option value="1.19">19%</option>
                            </select>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group">
                            <label>Fecha de incio / Finaliza</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    <input type="text" readonly class="form-control float-right active" id="reservationtime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3" style="margin-top:30px">
                        <div class="form-group">
                            <button type="button" class="btn btn-info" @click="savePromotion()"><i class="fa fa-plus-circle"></i> Aplicar descuento</button>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!-- <div class="row">
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
       </div> -->
    </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
        validated:true,
    };
  },
  props:['priceBase', 'productId'],
  methods:{
        savePromotion(){
            let daterangepicker_start = $('input[name="daterangepicker_start"]').val();
            let daterangepicker_end = $('input[name="daterangepicker_end"]').val();
            let price = $('input[name="price_promotion"]').val();         
            let price_tax = $('input[name="tax"]').val();
            let discount = this.newPromotion.discount;
            let price_total = 0;
            
            price_total = (price - (price * discount) / 100); 
            if(price_tax != 0){
                price_total = price_total * price_tax;
            }
            
            console.log(price_total);
        },
        
  }
};
</script>
