<template>
    <div>
        <button @click="close()">close</button>

        <form @submit.prevent="createNewPlaylist">

            <div>
                PLAYLIST NAME: {{newPlaylistNameInput}}
            </div>
            <input type="text" v-model="newPlaylistNameInput" id="test" data-cy="create-playlist-name-input">

            <br><br>
            
            PLAYLIST TYPE: 
            <select v-model="newPlaylistType" data-cy="create-playlist-type-input">
                <option value="video">Video</option>
                <option value="audio">Audio</option>
                <option value="image">Images</option>
            </select>

            CREATED BE AUTO
            <br>

            <button type="submit" data-cy="create-playlist-submit">
                Submit
            </button>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            newPlaylistNameInput: null,
            newPlaylistType: null,
        }
    },

    methods: {
        close() {
            this.$parent.createPlaylistComponent = false;
            this.$parent.library = true;
            this.$parent.showEditPlaylist = false;

            location.reload();
        },

        createNewPlaylist() {
            axios.post('/createNewPlaylist', {
                newPlaylistName: this.newPlaylistNameInput,
                playlistType: this.newPlaylistType
            }).then((response) => {
                this.close();
            })
        }
    }
}
</script>
