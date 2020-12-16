<template>
    <div class="col-md-12">
        <div class="px-3">
            <h3 class="text-gray-800"> <i class="fas fa-archive"></i> Photo List</h3>

            <table class="table table-striped" v-if="photos.length > 0">
                <thead class="bg-vue text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Title</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(photo, index) in photos" :key="'photo-'+index">
                        <th scope="row">{{ index + 1}}</th>
                        <td><img :src="photo.thumbnailUrl" height="75px" width="auto"></td>
                        <td>{{ photo.title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PhotoList',
        props: {
            photos: {
                default: [],
            }
        },
    }
</script>
