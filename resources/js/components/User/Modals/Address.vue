<template>
    <div>
        <base-modal :id="`modal-${id}`" class="fade" dialog-class="modal-dialog-centered">
            <template v-slot:header>
                <header-modal title="<span class='text-vue' ><i class='fas fa-map-marked-alt'> User Full Address </span>"> </header-modal>
            </template>
            <table class="table">
                <tr>
                    <td>City</td>
                    <td>{{ address.city}}</td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>{{ address.street}}</td>
                </tr>

                <tr>
                    <td>Zip</td>
                    <td>{{ address.zipcode}}</td>
                </tr>

                <tr>
                    <td>Suite</td>
                    <td>{{ address.suite}}</td>
                </tr>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button
                    type="button"
                    class="btn btn-lg text-vue border bg-white w-100"
                    data-dismiss="modal"
                >
                    Tutup
                </button>
            </div>
        </base-modal>
    </div>
</template>

<script>
import BaseModal from '../../Partials/Modal/BaseModal.vue';
import HeaderModal from '../../Partials/Modal/Header.vue';

export default {
    name: 'UserAddress',
    components: {
        BaseModal,
        HeaderModal
    },
    props: {
        address: {
            defauit: null,
        },
        id: {
            default: null
        }
    },
    data() {
        return {
            urlToCart: '',
        };
    },
};
</script>
