<template>
    <div>
        <div v-show="library" class="container">
        <button @click="createPlaylist()" data-cy="create-button">
            Create 
        </button>
            <div v-for="(playlist, index) in playlistData" class="container">
                {{playlist.id}}
                PLAYLIST NAME: {{ playlist.playlist_name }}<br>
                PLAYLIST TYPE: {{ playlist.playlist_type }}<br>
                PLAYLIST CREATED BY: {{ playlist.created_by}}<br>
                PLAYLIST CREATED AT{{ playlist.created_at}}<br><br>
                <button 
                    @click="viewPlaylist(playlist.id)" 
                    data-cy="view-playlist-btn"
                >
                    VIEW
                </button>

                <button
                    @click="editPlaylist(playlist)" 
                    :data-cy="'edit-playlist-btn-' + playlist.id"
                >
                    EDIT
                </button>
                
                <button 
                    @click="deletePlaylist(playlist.id)" 
                    :data-cy="'delete-playlist-btn-' + playlist.id">
                    DELETE
                </button>
            </div>
        </div>


        <create-playlist v-if="createPlaylistComponent" />
        <single-playlist v-if="showSinglePlaylist" :playlistData="singlePlaylistMedia" :mediaData="selectedPlaylistMedia"/>
        <edit-playlist v-if="showEditPlaylist" :test="playlistToEdit" />

    </div>
</template>

<script>
    import axios from 'axios';


    export default {
        data() {
            return {
                library: true,
                playlistData: null,
                showSinglePlaylist: false,
                showEditPlaylist: false,
                createPlaylistComponent: false,
                singlePlaylistMedia: null,
                selectedPlaylistMedia: null,
                playlistToEdit: null
            }
        },
        
        props: ['playlists'],

        mounted() {
            // console.log(JSON.parse(this.$props.playlists))
            this.playlistData = JSON.parse(this.$props.playlists)
        },

        methods: {
            editPlaylist(selectedPlaylist) {
                this.showEditPlaylist = true;
                this.library = false;
                this.createPlaylistComponent = false;
                this.playlistToEdit = selectedPlaylist;
            },
            
            viewPlaylist(id) {
                console.log(id)
                this.showSinglePlaylist = true;
                this.library = false;
                this.showEditPlaylist = false;

                axios.get('/getPlaylist/' + id).then((response) => {
                    this.singlePlaylistMedia = response.data;
                    console.log(this.singlePlaylistMedia)
                })

                axios.get('/getAllMediaBelongingToPlaylist/' + id).then((response) => {
                    this.selectedPlaylistMedia = response.data;
                    console.log(this.playlistMedia);
                })
                
            },
            createPlaylist() {
                this.createPlaylistComponent = true;
                this.library = false;
                this.showEditPlaylist = false;
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

            deletePlaylist(id) {
                axios.post('/deletePlaylist', {
                    playlistId: id
                }).then(res=>console.log(res))
            }
        },
    }
</script>
