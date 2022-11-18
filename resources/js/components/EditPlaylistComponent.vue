<template>
    <div>
        <button @click="close()">Close</button><br>
        <strong>Edit Playlist: {{ test.playlist_name }} </strong>

        <form @submit.prevent="editPlaylist(test)">

            PLAYLIST NAME: <input type="text" v-model="newPlaylistName" data-cy="playlist-name-input">
            <br><br>

            <button type="submit" data-cy="submit-btn">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            newPlaylistName: null,
        }
    },

    methods: {
        editPlaylist(test) {
            axios.post('/editPlaylist', {
                name: this.newPlaylistName,
                id: test.id
            }).then((response) => {
                console.log(response);
                this.close();
                
            })
  
        },
        close() {
            this.$parent.library = true;
            this.$parent.showSinglePlaylist = false;
            this.$parent.showEditPlaylist = false;
        },
        // closeForm() {
        //     this.$parent.editPlaylist = false;
        //     // this.$parent.showSinglePlaylist = false;
        //     this.$parent.library = true;
        // },

        // editPlaylist() {
        //     axios.post('/editPlaylist', {
        //         name: this.playlistNameInput,
        //         id: this.$props.test.id
        //     }).then((response) => {
        //         console.log(response);
        //         if (response.status == 200) {
        //             alert('Name Changed');
        //             this.$parent.editPlaylist = false;
        //             this.$parent.library = true;
        //         }

        //     }).catch((error) => {
        //         console.log(error);
        //     })
        // }
    },

    props: ['test']
}
</script>
