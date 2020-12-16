<template>
    <div class="modal-header border-0 pb-0">
        <div class="position-relative w-100 mb-3">
            <a
                class="close text-vue"
                data-dismiss="modal"
                @click="$emit('close')"
            >
                <span aria-hidden="true">&times;</span>
            </a>
            <div class="text-center font-weight-bold h5 pt-2 mx-auto text-dark" v-html="title">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: '',
        },
        layoutInline: {
            type: Boolean,
            default: true,
        },
    },
};
</script>

<style scoped>
a {
    right: 0;
}
</style>
