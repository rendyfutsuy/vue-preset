<template>
    <base-filter
        identification="user-select-filter"
        v-on:reset-form="resetForm()"
        v-on:submit-form="submitForm()"
    >
        <div class="form-group">
            <span> Pick User </span>

            <v-select 
                v-model="selectedUserId"
                :options="users"
                taggable
                name="user"
                :reduce="user => user.id"
                label="username"
            >
                <template v-slot:option="option">
                    {{ option.username }}, id: {{ option.id }}
                </template>
            </v-select>
        </div>
    </base-filter>
</template>

<script>
    import BaseFilter from './Partials/BaseFilter.vue';

    export default {
        name: 'UserSelectFilter',
        components: {
            BaseFilter
        },
        props: {
            params: {
                type: Object,
            }, 
        },
        data() {
            return {
                users: [],
                token: null,
                selectedUserId: null,
                submitForms: {
                    userId: null,
                },
            }
        },
        mounted() {
            this.token = sessionStorage.getItem("adminToken");
            this.fetchUsers();
        },
        watch: {
            selectedUserId: function (values) {
                this.submitForms.userId = values;
            }
        },
        methods: {
            fetchUsers: function() {
                axios.get(this.$apiUrl+'users').then(response => {
                    this.users = response.data;
                });
            },
            
            loadingUrl: function () {
                return window.location.origin + '/image/loading.gif';
            },

            resetForm: function () {
                this.selectedUserId = [];
                this.submitForms.userId = [];
            },

            submitForm: function () {
                this.$emit('request-new-list', this.submitForms.userId);
            },
        }
    }
</script>