<template>
    <div>

        <strong>Playlist</strong>
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <label for="">Add media</label>
                <input type="file" @change="onChange">
                <input type="submit" value="upload">
            </form>
        <div v-for="files in media">

    

            <br>
            <div class="card">
                 MEDIA NAME: {{ files.media_name }}<br> 
                 MEDIA TYPE: {{ files.media_type }}<br><br>
                 <button>view media</button>
                 <button>delete media</button>
                 <button>edit media</button>
            </div>
           
        </div>
        <button @click="close()">Close</button>



    </div>
</template>

<script>

export default {
    data() {
        return {
            file: null,
            playlistId: null,
            
            
        }
    },

    methods: {
        close() {
            this.$parent.library = true;
            this.$parent.showSinglePlaylist = false;
            this.$parent.showEditPlaylist = false;
        },

        
            onChange(e) {
                console.log("selected file", e.target.files[0]);
                this.file = e.target.files[0];
                this.playlistId = this.$props.media[0].playlist_id
                
                
            },

        submit() {
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('playlist_id', this.playlistId)
            axios.post('/upload', formData).then((response) => {
                console.log('response', response.data);
            }).catch((error) => {
                console.log(error);
            })
        }
        
        // closePlaylist() {
        //     this.$parent.showSinglePlaylist = false;
        //     this.$parent.library = true;
        // },

        // deleteFromPlaylist(playlistId, mediaId) {
        //     // console.log(id);
        //     console.log(playlistId)
        //     console.log(mediaId);
        //     axios.post('/deleteMediaFromPlaylist', {
        //         playlistId: playlistId,
        //         mediaId: mediaId
        //     }).then(res=>console.log(res))
        // }
    },

    props: ['media']
}
</script>
