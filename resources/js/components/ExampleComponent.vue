<template>
    <div>
        
        <div>
            <!-- {{ fields.data }} {{ fields }} -->
        </div>

        <div v-for="field in fields">
            Playlist: {{ field.id }}
            <br>

            <!-- {{ field.media }} -->
            <div v-for="media in JSON.parse(field.media)">
                
                NAME: {{ media.media_name }}
                <br>
                TYPE: {{ media.media_type}}
                
            </div>
            <br>
        </div>
        <div>{{ errors }}</div>
        
    </div>
</template>

<script>
    import axios from 'axios';

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
                console.log(response);
                this.fields = response.data;
            }).catch((error) => {
                this.erros = error;
            })
        }
    }
</script>
