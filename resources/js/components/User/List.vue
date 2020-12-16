<template>
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-vue font-weight-bold text-white border-bottom border-gray-800"> <i class="fas fa-users"></i> User Page</div>

                    <div class="card-body">
                        This Page is uses to get users data from <span class="font-weight-bold text-vue">https://jsonplaceholder.typicode.com/users</span>.
                        this page include with user's posts, user's albums and user's comments.
                    </div>
                </div>
            </div>
        </div>

        <div class="px-3">
            <h3 class="text-gray-800"> <i class="fas fa-users"></i> User List</h3>

            <table class="table table-striped">
                <thead class="bg-vue text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>otto</td>
                        <td>email@mdo.com</td>
                        <td>
                            <button class="btn btn-lg text-white bg-vue"> <abbr title="Post List"> <i class="fas fa-archive"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="showAddress(address)"> <abbr title="User/'s Address"> <i class="fas fa-map"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue"> <abbr title="User/'s Albums"> <i class="fas fa-journal-whills"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue"> <abbr title="User/'s Todos"> <i class="fas fa-list-alt"></i> </abbr></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <address-modal
            :address="address"
            id="address-show"
        ></address-modal>
    </div>
</template>

<script>
    import AddressModal from '../User/Modals/Address.vue';

    export default {
        name: 'UserList',
        components: {
            AddressModal,
        },
        data() {
            return {
                users: [],
                address: {
                    street: "Kulas Light",
                    suite: "Apt. 556",
                    city: "Gwenborough",
                    zipcode: "92998-3874",
                },
            }
        },
        mounted() {
            // 
        },

        methods: {
            showAddress: function (address) {
                this.address = address;
                $('#modal-address-show').modal('show');
            }
        }
    }
</script>
