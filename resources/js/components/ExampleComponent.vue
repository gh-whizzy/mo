<template>
    <div>
        <!-- <div v-show="errors">{{ errors }}</div> -->

        <button @click="createPlaylist()">
            Create
        </button>

        <strong>PlaylistData</strong>
        <div v-show="library">{{ library }}</div>


        <!-- <create-playlist v-if="createPlaylistComponent" /> -->
  
        <!-- <div v-show="library">
        <button @click="createPlaylist()">
            Create
        </button>
            <div v-for="playlist in playlists">
                
        
                PLAYLIST NAME: {{ playlist.playlist_name }}
                <br>

                
            

                <button @click="viewPlaylist(playlist)">View {{playlist.id}} </button>
                <button @click="editForm(playlist)">
                    Edit
                </button>
                <button @click="deletePlaylist(playlist.id)">
                    Delete
                </button>

                <br>
            </div>
        </div>
        
        
        <single-playlist v-if="showSinglePlaylist" :test="this.selectedPlaylist" :media="this.playlistMedia" />

        <edit-playlist v-if="editPlaylist" :test="selectedPlaylist" /> -->
        
    </div>
</template>

<script>
    import axios from 'axios';


    export default {
        data() {
            return {
                library: this.playlists
                // playlists: null,
                // errors: null,

                // showSinglePlaylist: false,
                // selectedPlaylist: null,
                // playlistMedia: null,
                // editPlaylist: false,

                // library: true,


                // createPlaylistComponent: false,

      
            }
        },
            props: ['playlists'],


        // methods: {
            // createPlaylist() {
            //     this.createPlaylistComponent = true;
            //     this.library = false;
            // },
            // viewPlaylist(playlist) {
            //     // console.log('json parse')
            //     // console.log(JSON.parse(playlist.media));
            //     axios.get('/playlist/' + playlist.media).then((response) => {
            //         console.log(response.data);
            //         this.playlistMedia = response.data;
            //         console.log(this.playlistMedia);
            //     })

            //     this.showSinglePlaylist = true;
            //     this.library = false;
            //     this.selectedPlaylist = playlist;
            //     // console.log(this.selectedPlaylist);
            // },
            
            // editForm(playlist) {
            //     // console.logJSON.parse(playlist.id);
                
            //     this.library = false;
            //     this.editPlaylist = true;
            //     axios.get('/test/' + playlist.id).then(res=> {
            //         // console.log(res)
            //         this.selectedPlaylist = res.data;
            //         // console.log(this.selectedPlaylist)
            //     });
            // },

            // deletePlaylist(id) {
            //     axios.post('/deletePlaylist', {
            //         playlistId: id
            //     }).then(res=>console.log(res))
        //     }
        // },

        mounted() {
         
            // axios.get('/getAllPlaylists').then((response) => {
            //     // console.log(response);
            //     this.playlists = response.data;
            // }).catch((error) => {
            //     this.erros = error;
            // })
        }
    }
</script>
