<template>
    <div>
        <div v-show="library" class="container">
        <button @click="createPlaylist()" data-cy="create-button">
            Create 
        </button>
            <div v-for="(playlist, index) in playlistData" class="container">
                <div>
                    PLAYLIST NAME: {{ playlist.playlist_name }}<br>
                </div>

                <div>
                    PLAYLIST TYPE: {{ playlist.playlist_type }}<br>
                </div>
        
                <div>
                    PLAYLIST CREATED BY: {{ playlist.created_by}}<br>
                </div>

                <div>
                    PLAYLIST CREATED AT{{ playlist.created_at}}<br><br>
                </div>
                
                <button 
                    @click="viewPlaylist(playlist.id)" 
                    :data-cy="'view-playlist-btn-' + playlist.id"
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
                    :data-cy="'delete-playlist-btn-' + playlist.id"
                >
                    DELETE
                </button>
            </div>
        </div>

        <create-playlist v-if="createPlaylistComponent" />
        <single-playlist v-if="showSinglePlaylist" :playlistData1="singlePlaylistMedia" :test1="test"/>
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
                playlistToEdit: null,

                // Last mintue addition to find manually test
                // where my data was
                test: null
            }
        },
        
        props: ['playlists'],

        mounted() {
            this.playlistData = JSON.parse(this.$props.playlists);
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
                })

                axios.get('/getAllMediaBelongingToPlaylist/' + id).then((response) => {
                    this.test = response.data;
                    console.log(this.test);
                })
                
            },
            
            createPlaylist() {
                this.createPlaylistComponent = true;
                this.library = false;
                this.showEditPlaylist = false;
            },

            deletePlaylist(id) {
                axios.post('/deletePlaylist', {
                    playlistId: id
                }).then(res=>console.log(res));
            }
        },
    }
</script>
