<template>
    <div>
        <div v-show="errors">{{ errors }}</div>
        <button>
            Create
        </button>
        <br><br>

        <div v-for="playlist in playlists">
       
            PLAYLIST NAME: {{ playlist.playlist_name }}
            <br>
        

            <!-- {{ playlist.media }} -->
            <button>
                View
            </button>
            <button>
                Edit
            </button>
            <button>
                Delete
            </button>
            <div v-for="media in JSON.parse(playlist.media)">
                
                <!-- NAME: {{ media.media_name }}
                <br>
                TYPE: {{ media.media_type}} -->
                
            </div>
            <br>
        </div>
        
        
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                playlists: null,
                errors: null
            }
        },

        mounted() {
            axios.get('/getAllPlaylists').then((response) => {
                console.log(response);
                this.playlists = response.data;
            }).catch((error) => {
                this.erros = error;
            })
        }
    }
</script>
