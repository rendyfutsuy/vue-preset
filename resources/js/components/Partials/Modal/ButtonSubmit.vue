<template>
    <button
        :type="type"
        class="btn btn-lg btn-hola col-5"
        @click="$emit('click')"
    >
        {{ text }}
    </button>
</template>

<script>
export default {
    props: {
        text: {
            type: String,
            default: 'Simpan',
        },
        type: {
            type: String,
            default: 'button',
        },
    },
};
</script>
