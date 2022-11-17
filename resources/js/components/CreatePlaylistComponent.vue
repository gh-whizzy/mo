<template>
    <div>
        <button @click="close()">close</button>

        <form @submit.prevent="createNewPlaylist">


            
            PLAYLIST NAME: {{newPlaylistNameInput}}
            <input type="text" v-model="newPlaylistNameInput">

            <br><br>
            
            PLAYLIST TYPE: 
            <select v-model="newPlaylistType">
                <option value="video">Video</option>
                <option value="audio">Audio</option>
                <option value="image">Images</option>
            </select>

            CREATED BE AUTO
            <br>


            <!-- <input type="text" v-model="playlistNameInput"> -->
            <button type="submit">Submit</button>
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
