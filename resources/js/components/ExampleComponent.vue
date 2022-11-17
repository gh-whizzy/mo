<template>
    <div>
        <div v-show="errors">{{ errors }}</div>
        <button>
            Create
        </button>
        <br><br>

  
        <div v-show="library">
            <div v-for="playlist in playlists">
                
        
                PLAYLIST NAME: {{ playlist.playlist_name }}
                <br>

                
            

                <!-- {{ playlist.media }} -->
                <button @click="viewPlaylist(playlist)">View {{playlist.id}} </button>
                <button @click="editForm(playlist)">
                    Edit
                </button>
                <button>
                    Delete
                </button>
                <!-- <div v-for="media in JSON.parse(playlist.media)"> -->
                    
                    <!-- NAME: {{ media.media_name }}
                    <br>
                    TYPE: {{ media.media_type}} -->
                    
                <!-- </div> -->
                <br>
            </div>
        </div>
        
        
        <single-playlist v-if="showSinglePlaylist" :test="this.selectedPlaylist" :media="this.playlistMedia" />

        <edit-playlist v-if="editPlaylist" :test="selectedPlaylist" />
        
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                playlists: null,
                errors: null,

                showSinglePlaylist: false,
                selectedPlaylist: null,
                playlistMedia: null,
                editPlaylist: false,

                library: true

      
            }
        },

        methods: {
            viewPlaylist(playlist) {
                // console.log('json parse')
                // console.log(JSON.parse(playlist.media));
                axios.get('/playlist/' + playlist.media).then((response) => {
                    console.log(response.data);
                    this.playlistMedia = response.data;
                    console.log(this.playlistMedia);
                })

                this.showSinglePlaylist = true;
                this.library = false;
                this.selectedPlaylist = playlist;
                // console.log(this.selectedPlaylist);
            },
            
            editForm(playlist) {
                // console.logJSON.parse(playlist.id);
                
                this.library = false;
                this.editPlaylist = true;
                axios.get('/test/' + playlist.id).then(res=> {
                    // console.log(res)
                    this.selectedPlaylist = res.data;
                    // console.log(this.selectedPlaylist)
                });
            }
        },

        mounted() {
            axios.get('/getAllPlaylists').then((response) => {
                // console.log(response);
                this.playlists = response.data;
            }).catch((error) => {
                this.erros = error;
            })
        }
    }
</script>
