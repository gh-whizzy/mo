<template>
    <div>
        <div v-for="field in fields">
            <div>{{ field.id }}</div>
            <div>{{ field.playlist_name }}</div>
            <div>{{ field.playlist_type }}</div>
            <div>{{ field.created_by }}</div>
            <div>{{ field.media }}</div>
        </div>
        <div>{{ errors }}</div>
        
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                fields: null,
                errors: null
            }
        },

        mounted() {
            console.log('mounted')
            axios.get('/getAllPlaylists').then((response) => {
                this.fields = response.data;
            }).catch((error) => {
                this.erros = error;
            })
        }
    }
</script>
