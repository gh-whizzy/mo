<template>
    <div>
        {{test.playlist_name}}
          

        <form @submit.prevent="editPlaylist">
            What would you like do edit?
            <br><br>
            
            Playlist name: 
            <input type="text" v-model="playlistNameInput">
            <button type="submit">Submit</button>
        </form>
    </div>
    <button @click="closeForm()">Close</button>
</template>

<script>
export default {
    data() {
        return {
            playlistNameInput: null
        }
    },

    methods: {
        closeForm() {
            this.$parent.editPlaylist = false;
            this.$parent.showSinglePlaylist = false;
            this.$parent.library = true;
        },

        editPlaylist() {
            axios.post('/editPlaylist', {
                playlistName: this.playlistNameInput,
                id: this.$props.test.id
            }).then((response) => {
                console.log(response);
            }).catch((error) => {
                console.log(error);
            })
        }
    },

    props: ['test']
}
</script>
