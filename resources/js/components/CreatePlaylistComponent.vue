<template>
    <div>
        <button @click="close()">close</button>

        <form @submit.prevent="createNewPlaylist">


            
            PLAYLIST NAME: 
            <input type="text" v-model="newPlaylistNameInput">

            <br><br>
            
            PLAYLIST TYPE: 
            <select name="" id="" v-model="newPlaylistType">
                <option value="video">Video</option>
                <option value="audio">Audio</option>
                <option value="images">Images</option>
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
            console.log('closed');
            this.$parent.createPlaylistComponent = false;
            this.$parent.library = true;
        },

        createNewPlaylist() {
            axios.post('/createNewPlaylist', {
                newPlaylistName: this.newPlaylistNameInput,
                playlistType: this.newPlaylistType
            }).then(res=>console.log(res))
        }
    }
}
</script>
