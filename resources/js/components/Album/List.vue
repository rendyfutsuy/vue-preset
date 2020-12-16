<template>
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-vue font-weight-bold text-white border-bottom border-gray-800"> <i class="fas fa-archive"></i> Album Page</div>

                    <div class="card-body">
                        This Page is uses to get albums data from <span class="font-weight-bold text-vue">https://jsonplaceholder.typicode.com/albums</span>.
                        this page include with album's detail.
                    </div>
                </div>
            </div>
        </div>

        <user-select-filter
            class="my-4"
            v-on:request-new-list="fetchAlbumBasedOnUser"
        ></user-select-filter>

        <div class="px-3">
            <h3 class="text-gray-800"> <i class="fas fa-archive"></i> Album List</h3>

            <table class="table table-striped" v-if="albums.length > 0">
                <thead class="bg-vue text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(album, index) in albums" :key="'album-'+index">
                        <th scope="row">{{ index + 1}}</th>
                        <td>{{ album.userId }}</td>
                        <td>{{ album.title }}</td>
                        <td>
                            <button class="btn btn-lg text-white bg-vue" v-on:click="showDetail(album)"> <abbr title="User/'s Detail"> <i class="fas fa-file"></i> </abbr></button>
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
    import DetailModal from '../Album/Modals/Detail.vue';
    import UserSelectFilter from '../UserSelectFilter.vue';

    export default {
        name: 'AlbumList',
        components: {
            DetailModal,
            UserSelectFilter,
        },
        data() {
            return {
                albums: [],
                detail: null,
                userId: null,
            }
        },
        mounted() {
            this.userId = this.$store.getters.userId;
            this.fetchAlbums();
        },

        methods: {
            fetchAlbums: function() {
                axios.get(this.$apiUrl+'albums').then(response => {
                    this.albums = response.data;
                });
            },

            fetchAlbumBasedOnUser: function(id) {
                this.albums = [];

                axios.get(this.$apiUrl+'users/' + id + '/albums').then(response => {
                    this.albums = response.data;
                    this.$refs.ShowDetail.getUserData(id);
                    this.$store.commit('updateUserId', id);
                });
            },

            showDetail: function (detail) {
                this.detail = detail;
                this.$refs.ShowDetail.getUserData(detail.userId);
                this.$refs.ShowDetail.fetchAlbumPhotos(detail.id);
                
                $('#modal-detail-show').modal('show');
                this.$store.commit('updateUserId', detail.userId);
            },
        }
    }
</script>
