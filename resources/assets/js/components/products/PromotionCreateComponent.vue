<template>
    <div>
        <div class="card">
            <div class="card-header">Crear un descuento</div>
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
                            <input type="number"  v-model="newPromotion.price" :disabled="validated" :placeholder="priceBase " class="form-control">
                            <div class="help-block" v-if="errors.price">
                                <b>{{ errors.price[0] }}</b>
                            </div>
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
                            <input type="number" v-model="newPromotion.discount" name="discount" class="form-control">
                            <div class="help-block" v-if="errors.discount">
                                <b>{{ errors.discount[0] }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>¿Este precio lleva impuesto?</label>
                            <select name="tax" v-model="newPromotion.price_tax" class="form-control" id="">
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
                            <div class="help-block" v-if="errors.ends_at">
                                <b>{{ errors.ends_at[0] }}</b>
                            </div>
                            <div class="help-block" v-if="errors.start_at">
                                <b>{{ errors.start_at[0] }}</b>
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
        <div class="card">
            <div class="card-header">
                Descuento
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Precio</th>
                        <th>Precio con descuento</th>
                        <th>Descuento</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de finalización</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        <tr v-for="(promotion, index) in promotions" :key="index">
                            <td>{{ promotion.id }}</td>
                            <td>{{ promotion.humanPrice }}</td>
                            <td>{{ promotion.humanPriceTotal }}</td>
                            <td>{{ promotion.humanDiscount }}</td>
                            <td>{{ promotion.start_at }}</td>
                            <td>{{ promotion.ends_at }}</td>
                            <td class="text-center"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      validated: true,
      formControl: true,
      hasError: false,
      newPromotion: {
        price: null,
        price_tax: 0,
        discount: 0
      },
      errors: [],
      promotions:[],
    };
  },
  props: ["priceBase", "productId"],
  methods: {
    savePromotion() {
      let daterangepicker_start = $(
        'input[name="daterangepicker_start"]'
      ).val();
      let daterangepicker_end = $('input[name="daterangepicker_end"]').val();
      let price = 0;
      let price_tax = this.newPromotion.price_tax;
      let discount = this.newPromotion.discount;
      let price_total = 0;

      if (this.validated == false) {
        price = this.newPromotion.price;
      } else {
        price = this.priceBase;
      }

      price_total = price - price * discount / 100;
      if (price_tax != 0) {
        price_total = price_total * price_tax;
      }

      axios
        .post(`/admin/promotions`, {
          price: price,
          price_tax: price_tax,
          price_total: price_total,
          discount: discount,
          product_id: this.productId,
          ends_at: daterangepicker_end,
          start_at: daterangepicker_start
        })
        .then(response => {
          $.notify({ message: response.data.response }, { type: "success" });
          this.errors = [];
        })
        .catch(errors => {
          if (errors.response.status == 422) {
            this.errors = errors.response.data.errors;
            if (this.errors.product_id[0] == "unico") {
              $.notify(
                { message: "Solo puedes crear una promoción por producto" },
                { type: "danger" }
              );
            }
          }
        });
    },
    getPromotion(){
        axios.get(`/admin/promotions/${this.productId}`).then(response=>{
            this.promotions = response.data.data;
        });
    }
  },
  mounted(){
      this.getPromotion();
  }
};
</script>


