<template>
    <div class="text-center">
        <button class="btn-check btn btn-success" v-if="status == 1" @click="changeStatus(0, categoryid, subcategoryid)">
            <i class="fa fa-check"></i> 
        </button>
        <button class="btn-check btn btn-danger" v-else @click="changeStatus(1, categoryid, subcategoryid)">
            <i class="fa fa-times"></i> 
        </button>
    </div>
</template>

<script>
    export default{
        name: 'StatusSubCategoryComponent',
        data(){
            return{
                endpoints:'change-status',
            }
        },
        props:['status', 'categoryid', 'subcategoryid'],
        methods:{
            changeStatus(status,categoryid,subcategoryid){
                axios.post(this.endpoints ,{
                    _status : status,
                    _subcategoryId : subcategoryid
                }).then((response => {
                    $.notify({
                        message: response.data.res,
                    },{type: 'success' });

                    setTimeout(()=>{
                        window.location.href='/admin/subcategories/'+ categoryid;
                    },2000);

                }))
            }
        }
    }
</script>

<style>
    .btn-check{
        border:0;
        cursor: pointer;
    }
    .btn-check i{
        font-size: 13px;
    }
</style>
