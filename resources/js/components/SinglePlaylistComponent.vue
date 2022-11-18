<template>
    <div>
        <button @click="close()">Close</button>

        <b></b>

  

        <strong>Playlist </strong>
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <label for="">Add media</label>
                <input type="file" @change="onChange">
                <input type="submit" value="upload">
            </form>
        <div v-if="allMedia">
            <div v-for="media in test1">

                <br>
                <div class="card">
                    MEDIA NAME: {{media.media_name}} <br> 
                    MEDIA TYPE: {{media.media_type}}<br><br>
                    <button @click="view(media.id)">view media</button>
                    <button @click="deleteMedia(media.id)">delete media</button>
                    <button>edit media</button>
                </div>
            
            </div>
        </div>
        

        <div v-if="viewSelectedMedia">
            <div>Media Name: {{ test2.media_name }}</div>
            <div>Media Type: {{ test2.media_type }}</div>
            <div>Media File: {{ test2.file_path }}</div>
            <button @click="closeSelectedMedia">Close</button>
        </div>

    </div>
</template>

<script>

export default {
    data() {
        return {
            file: null,
            playlistId: null,
            viewSelectedMedia: false,
            test2: null,
            allMedia: true,
            md: this.$props.playlistData1
        }
    },

    props: ['playlistData1', 'test1'],

    methods: {
        view(id) {
            console.log(id)
            this.viewSelectedMedia = true
            axios.get('/getSelectedMedia/' + id).then((response) => {
          
                this.test2 = response.data;
                this.allMedia = false;
            })
        },

        closeSelectedMedia() {
            this.allMedia = true;
            this.viewSelectedMedia = false;
        },

        deleteMedia(id) {
            axios.post('/deleteMediaFromPlaylist/' + id).then((response) => {
                window.location.reload();
            })
        },

        close() {
            window.location.reload();
            this.$parent.library = true;
            this.$parent.showSinglePlaylist = false;
            this.$parent.showEditPlaylist = false;
            this.viewSelectedMedia = false
        },

        
        onChange(e) {
            console.log("selected file", e.target.files[0]);
            this.file = e.target.files[0];
            this.playlistId = this.$props.playlistData[0].playlist_id
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
    },
}
</script>
