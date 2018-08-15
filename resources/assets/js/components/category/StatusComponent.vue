<template>
    <div class="text-center">
        <button class="btn-check btn btn-success" v-if="status == 1" @click="changeStatus(0, categoryid)">
            <i class="fa fa-check"></i> 
        </button>
        <button class="btn-check btn btn-danger" v-else @click="changeStatus(1, categoryid)">
            <i class="fa fa-times"></i> 
        </button>
    </div>
</template>

<script>
    export default{
        name: 'StatusCategoryComponent',
        data(){
            return{
                endpoints:'',
            }
        },
        props:['status', 'categoryid'],
        methods:{
            changeStatus(status,categoryid){
                axios.put(`/admin/categories/update-status/${categoryid}` ,{
                    status : status,
                }).then((response => {
                    $.notify({
                        message: response.data.res,
                    },{type: 'success' });

                    setTimeout(()=>{
                        window.location.href='/admin/categories';
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
