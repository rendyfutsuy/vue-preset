<template>
    <button
        type="button"
        class="btn btn-lg text-hola border bg-white col-5"
        data-dismiss="modal"
    >
        {{ text }}
    </button>
</template>

<script>
export default {
    props: {
        text: {
            type: String,
            default: 'Batal',
        },
    },
};
</script>
