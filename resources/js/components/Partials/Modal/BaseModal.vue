<template>
    <div class="modal"
         tabindex="-1"
         role="dialog"
         aria-hidden="true"
    >
        <div :class="`modal-dialog ${dialogClass}`" role="document">
            <div class="modal-content">
                <slot name="header">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ title }}
                        </h5>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="text-vue">&times;</span>
                        </button>
                    </div>
                </slot>

                <div class="modal-body">
                    <slot />
                </div>

                <div v-if="hasFooterSlot" class="modal-footer">
                    <slot name="footer" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BaseModal',
    props: {
        size: {
            type: String,
            default: '',
        },
        title: {
            type: String,
            default: '',
        },
        dialogClass: {
            type: [String, Array],
            default: '',
        },
    },
    computed: {
        hasFooterSlot() {
            return !!this.$slots.footer;
        },
    },
};
</script>
