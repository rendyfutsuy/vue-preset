<template>
    <div>
        <base-modal :id="`modal-${id}`" class="fade" dialog-class="modal-dialog-centered">
            <template v-slot:header>
                <header-modal title="<span class='text-vue' ><i class='fas fa-file'> Post Detail </span>"> </header-modal>
            </template>
            <table class="table" v-if="detail && user && photos.length > 0">
                <tr>
                    <td>Title</td>
                    <td>{{ detail.title}}</td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>{{ user.username}}</td>
                </tr>

                <tr>
                    <td>Photo's Quantity</td>
                    <td>{{ photos.length }}</td>
                </tr>
            </table>
            <div class="row justify-content-center" v-else>
                <span class="fa-3x text-vue">
                    <i class="fas fa-cog fa-spin"></i>
                </span>
                <sub class="fa-1x text-vue">
                    <i class="fas fa-cog fa-spin"></i>
                </sub>
                <span class="fa-4x text-vue">
                    <i class="fas fa-cog fa-spin"></i>
                </span>
            </div>

            <template v-slot:footer>
                <photos :photos="photos"></photos>

                <div class="mt-4 d-flex justify-content-between">
                    <button
                        type="button"
                        class="btn btn-lg text-vue border bg-white w-100"
                        data-dismiss="modal"
                    >
                        Close
                    </button>
                </div>
            </template>
        </base-modal>
    </div>
</template>

<script>
import BaseModal from '../../Partials/Modal/BaseModal.vue';
import HeaderModal from '../../Partials/Modal/Header.vue';
import Photos from '../Partials/PhotoList.vue';

export default {
    name: 'AlbumDetail',
    components: {
        BaseModal,
        HeaderModal,
        Photos
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
            user: null,
            photos: [],
        };
    },

    methods: {
        getUserData: function (userId) {
            if (this.$store.getters.userId == userId) {
                return;
            }

            this.user = null;

            axios.get(this.$apiUrl +'users/' + userId).then(response => {
                this.user = response.data;
            });
        },

        fetchAlbumPhotos: function (detailId) {
            this.photos = [];

            axios.get(this.$apiUrl +'albums/' + detailId + '/photos/').then(response => {
                this.photos = response.data;
            });
        },

        isCompleted: function (status) {
            if (status) {
                return 'Completed';
            }
            return 'Pending';
        }
    },
};
</script>
