<template>
    <v-layout column align-center class="mt-10">
            <h1 class="display-1 mb-10">Users List</h1>
            <v-data-table
                :search="search"
                :loading="loading"
                :headers="headers"
                :items="users"
                :items-per-page="10"
                :sort-by="['name', 'email','country','registered']"
                class="elevation-1"
                style="width:100%"
            >
                <template v-slot:top>
                    <v-text-field
                        v-model="search"
                        label="Search"
                        class="mx-4"
                        append-icon="search"
                        single-line
                        hide-details
                    ></v-text-field>
                </template>
            </v-data-table>
        </v-layout>
</template>

<script>
import axios from "../libs/axios";

export default {
    data() {
        return {
            search: '',
            loading: true,
            headers: [
                {
                    text: 'Name',
                    value: 'name',
                    sortable:false
                },
                {
                    text: 'Email',
                    value: 'email',
                    sortable:false
                },
                {
                    text: 'Phone',
                    value: 'phone',
                    sortable:false
                },
                {
                    text: 'Country',
                    value: 'country',
                    sortable:false
                },
                {
                    text: 'Registered',
                    value: 'registered',
                    sortable:false
                },

            ],
            users: [],
        }
    },
    methods: {
        fetchUsers() {
            axios.get('/user').then(res => {
                this.users = res.data.items
                this.loading = false
            })
        }
    },
    mounted() {
        this.fetchUsers()
    }
}
</script>
