<template>
    <div>
        <!-- <div v-show="errors">{{ errors }}</div> -->

        

        <br>

        <div v-show="library" class="container">
            <button @click="createPlaylist()" class="container">
            Create
        </button>
            <div v-for="playlist in playlistData" class="container">
                ID: {{ playlist.id }} <br>
                PLAYLIST ID: {{ playlist.playlist_id }} <br>

                PLAYLIST NAME: {{ playlist.playlist_name }}<br>
                PLAYLIST TYPE: {{ playlist.playlist_type }}<br>
                PLAYLIST CREATED BY: {{ playlist.created_by}}<br>
                PLAYLIST CREATED AT{{ playlist.created_at}}<br><br>
                <div v-for="media in playlist.media" class="card">
                    MEDIA ID: {{ media.id }}<br>
                    MEDIA PLAYLIST ID: {{ media.playlist_id }}<br>
                    MEDIA NAME: {{ media.media_name }}<br>
                    MEDIA TYPE: {{ media.media_type }}<br>
                </div>
                <br>
                <button>VIEW</button>
                <button>EDIT</button>
                <button>DELETE</button>
            </div>
        </div>


        <create-playlist v-if="createPlaylistComponent" />
  
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
                library: true,
                playlistData: JSON.parse(this.playlists)
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


        methods: {
            createPlaylist() {
                this.createPlaylistComponent = true;
                this.library = false;
            },
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
        },
    }
</script>
