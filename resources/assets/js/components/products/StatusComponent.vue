<template>
    <div class="text-center">
        <button class="btn-check btn btn-success" v-if="status == 1" @click="changeStatus(0, productid)">
            <i class="fa fa-check"></i> 
        </button>
        <button class="btn-check btn btn-danger" v-else @click="changeStatus(1, productid)">
            <i class="fa fa-times"></i> 
        </button>
    </div>
</template>

<script>
export default {
  name: "ProductStatusComponent",
  props: ["status", "productid"],
  methods: {
    changeStatus(status, productid) {
      axios
        .put(`/api/product/${productid}/change-status`, {
          status: status,
        })
        .then(response => {
          $.notify({message: 'Producto editado con éxito'},{ type: "success" });
          setTimeout(() => {
            window.location.href = "/admin/products";
          }, 3000);
        });
    }
  }
};
</script>

<style>
.btn-check {
  border: 0;
  cursor: pointer;
}
.btn-check i {
  font-size: 13px;
}
</style>
