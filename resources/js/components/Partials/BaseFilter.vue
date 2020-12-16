<template>
<div class="row justify-content-center p-0">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-white bg-vue border-white"> <i class="fas fa-filter"></i> Filter</div>
            <div class="card-body">
                <form :id="identification">
                    <slot></slot>

                    <div class="form-group px-3">
                        <button id="submitForm" type="button" class="btn bg-vue border-white text-white float-right col-md-2" v-on:click="$emit('submit-form')"><i class="fas fa-search"></i> Submit</button>
                        <button id="refreshForm" type="button" class="btn bg-vue border-white text-white float-right col-md-2" v-on:click="$emit('reset-form')"><i class="fas fa-sync"></i> Refresh</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: 'BaseFilter',
        props: {
            identification: {
                type:String,
                required:true,
            },
        },
    }
</script>