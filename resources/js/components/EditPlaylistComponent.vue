<template>
    {{test.id}}
    <strong>Edit Playlist: {{ test.playlist_name }} </strong>




     <form @submit.prevent="editPlaylist(test)" class="card">

            PLAYLIST NAME: 
            <input type="text" v-model="newPlaylistName">
            <br><br>

            <button type="submit">Submit</button>
        </form>
        <button @click="close()">Close</button>
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

            console.log(test.id)

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
