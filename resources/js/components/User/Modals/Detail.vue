<template>
    <div>
        <base-modal :id="`modal-${id}`" class="fade" dialog-class="modal-dialog-centered">
            <template v-slot:header>
                <header-modal title="<span class='text-vue' ><i class='fas fa-user-circle'> User Full Profile </span>"> </header-modal>
            </template>
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ detail.name}}</td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>{{ detail.username}}</td>
                </tr>

                <tr>
                    <td>E-mail</td>
                    <td>{{ detail.email}}</td>
                </tr>

                <tr>
                    <td>Phone Number</td>
                    <td>{{ detail.phone}}</td>
                </tr>

                <tr>
                    <td>Web Url</td>
                    <td>{{ detail.website}}</td>
                </tr>

                <tr v-if="detail.company">
                    <td>Company</td>
                    <td class="font-weight-bold">
                        {{ detail.company.name}} <br>
                        <sup class="font-weight-light">{{ detail.company.catchPhrase}}</sup>
                    </td>
                </tr>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button
                    type="button"
                    class="btn btn-lg text-vue border bg-white w-100"
                    data-dismiss="modal"
                >
                    Close
                </button>
            </div>
        </base-modal>
    </div>
</template>

<script>
import BaseModal from '../../Partials/Modal/BaseModal.vue';
import HeaderModal from '../../Partials/Modal/Header.vue';

export default {
    name: 'UserDetail',
    components: {
        BaseModal,
        HeaderModal
    },
    props: {
        detail: {
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
