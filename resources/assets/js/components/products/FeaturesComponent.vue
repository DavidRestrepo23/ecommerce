<template>
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <label>Caraterística del producto</label>
                    <select name="feature_detail_id[]" multiple v-model="feature_details" class="form-control select2 select2-hidden-accessible" style="width:100%;" tabindex="-1" aria-hidden="true">
                      <option value="" selected="selected"></option>
                      <optgroup v-for="(feature, index) in features" :key="index"  :label="feature.name">
                          <option v-for="(details,index) in feature.feature_details" selected="selected" :key="index" :value="details.id" >{{details.name}}</option>
                      </optgroup>
                  </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "FeaturesComponent",
  data() {
    return {
      features: [],
      feature_details: [],
      endpoints: "/api/features/get-features"
    };
  },
  props: ["productid"],
  mounted() {
    axios.get(this.endpoints).then(response => {
      this.features = response.data.features;
    });

    axios
      .get(`/api/product/${this.productid}/feature-details`)
      .then(response => {
        let details_id = response.data.feature_details;
        this.feature_details = details_id;
        this.feature_details.push("asd");
      });
  }
};
</script>

