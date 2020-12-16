<template>
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-vue font-weight-bold text-white border-bottom border-gray-800"> <i class="fas fa-archive"></i> Todo Page</div>

                    <div class="card-body">
                        This Page is uses to get todos data from <span class="font-weight-bold text-vue">https://jsonplaceholder.typicode.com/todos</span>.
                        this page include with todo's detail.
                    </div>
                </div>
            </div>
        </div>

        <user-select-filter
            class="my-4"
            v-on:request-new-list="fetchTodoBasedOnUser"
        ></user-select-filter>

        <div class="px-3">
            <h3 class="text-gray-800"> <i class="fas fa-archive"></i> Todo List</h3>

            <table class="table table-striped" v-if="todos.length > 0">
                <thead class="bg-vue text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(todo, index) in todos" :key="'todo-'+index">
                        <th scope="row">{{ index + 1}}</th>
                        <td>{{ todo.userId }}</td>
                        <td>{{ todo.title }}</td>
                        <td>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="showDetail(todo)"> <abbr title="User/'s Detail"> <i class="fas fa-file"></i> </abbr></button>
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

        <detail-modal
            :detail="detail"
            id="detail-show"
            ref="ShowDetail"
        ></detail-modal>
    </div>
</template>

<script>
    import DetailModal from '../Todo/Modals/Detail.vue';
    import UserSelectFilter from '../UserSelectFilter.vue';

    export default {
        name: 'TodoList',
        components: {
            DetailModal,
            UserSelectFilter,
        },
        data() {
            return {
                todos: [],
                detail: null,
                userId: null,
            }
        },
        mounted() {
            this.userId = this.$store.getters.userId;
            this.fetchTodos();
        },

        methods: {
            fetchTodos: function() {
                axios.get(this.$apiUrl+'todos').then(response => {
                    this.todos = response.data;
                });
            },

            fetchTodoBasedOnUser: function(id) {
                this.todos = [];

                axios.get(this.$apiUrl+'users/' + id + '/todos').then(response => {
                    this.todos = response.data;
                    this.$refs.ShowDetail.getUserData(id);
                    this.$store.commit('updateUserId', id);
                });
            },

            showDetail: function (detail) {
                this.detail = detail;
                this.$refs.ShowDetail.getUserData(detail.userId);
                $('#modal-detail-show').modal('show');
                this.$store.commit('updateUserId', detail.userId);
            },
        }
    }
</script>
