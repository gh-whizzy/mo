<template>
    <div>
        {{test.playlist_name}}
          

        <form @submit.prevent="editPlaylist">
            What would you like do edit?
            <br><br>
            
            Playlist name: 
            <input type="text">
            <button type="submit">Submit</button>
        </form>
    </div>
    <button @click="closeForm()">Close</button>
</template>

<script>
export default {
    data() {
        return {}
    },

    methods: {
        closeForm() {
            this.$parent.editPlaylist = false;
            this.$parent.showSinglePlaylist = false;
            this.$parent.library = true;
        },

        editPlaylist() {
            axios.post('/editPlaylist').then((response) => {
                console.log(response);
            })
        }
    },

    props: ['test']
}
</script>
