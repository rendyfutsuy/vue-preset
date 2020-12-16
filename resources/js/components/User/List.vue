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

            <table class="table table-striped" v-if="users.length > 0">
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
                    <tr v-for="(user, index) in users" :key="'user-'+index">
                        <th scope="row">{{ index + 1}}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.username }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="goToPostList(user.id)"> <abbr title="Post List"> <i class="fas fa-archive"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="showAddress(user.address)"> <abbr title="User/'s Address"> <i class="fas fa-map"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="goToAlbumList(user.id)"> <abbr title="User/'s Albums"> <i class="fas fa-journal-whills"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="goToTodoList(user.id)"> <abbr title="User/'s Todos"> <i class="fas fa-list-alt"></i> </abbr></button>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="showDetail(user)"> <abbr title="User/'s Detail"> <i class="fas fa-user-circle"></i> </abbr></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="row justify-content-center" v-else>
                <span class="fa-5x text-vue">
                    <i class="fas fa-cog fa-spin"></i>
                </span>
                <sub class="fa-3x text-vue">
                    <i class="fas fa-cog fa-spin"></i>
                </sub>
                <span class="fa-6x text-vue">
                    <i class="fas fa-cog fa-spin"></i>
                </span>
            </div>
        </div>
        
        <address-modal
            v-if="address"
            :address="address"
            id="address-show"
        ></address-modal>

        <detail-modal
            v-if="detail"
            :detail="detail"
            id="detail-show"
        ></detail-modal>
    </div>
</template>

<script>
    import AddressModal from '../User/Modals/Address.vue';
    import DetailModal from '../User/Modals/Detail.vue';

    export default {
        name: 'UserList',
        components: {
            AddressModal,
            DetailModal
        },
        data() {
            return {
                users: [],
                address: null,
                detail: null,
            }
        },
        mounted() {
            this.fetchUsers();
        },

        methods: {
            fetchUsers: function() {
                axios.get(this.$apiUrl+'users').then(response => {
                    this.users = response.data;
                    this.$store.commit('updateUsers', this.users);
                });
            },

            showAddress: function (address) {
                this.address = address;
                $('#modal-address-show').modal('show');
            },

            showDetail: function (detail) {
                this.detail = detail;
                $('#modal-detail-show').modal('show');
            },

            goToPostList: function(userId) {
                this.setMyUserId(userId);
                window.location.href = '/posts';
            },

            goToAlbumList: function(userId) {
                this.setMyUserId(userId);
                window.location.href = '/albums';
            },

            goToTodoList: function(userId) {
                this.setMyUserId(userId);
                window.location.href = '/todos';
            },

            setMyUserId: function (userId) {
                this.$store.commit('updateUserId', userId);
            }
        }
    }
</script>
