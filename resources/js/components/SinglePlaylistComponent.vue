<template>
    <div>
        <button @click="close()">Close</button>

        <!-- {{mediaData}} -->

        <strong>Playlist </strong>
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <label for="">Add media</label>
                <input type="file" @change="onChange">
                <input type="submit" value="upload">
            </form>

        <div v-show="allMedia">
            <div v-for="media in playlistData">
    

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
            {{selectedMedia}}
            <div>Media Name: {{ selectedMedia.media_name }}</div>
            <div>Media Type: {{ selectedMedia.media_type }}</div>
            <div>Media File: {{ selectedMedia.file_path }}</div>
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
            selectedMedia: null,
            allMedia: true,
            md: this.$props.playlistData
        }
    },

    props: ['playlistData'],

    methods: {
        view(id) {
            console.log(this.md)
            this.viewSelectedMedia = true
            axios.get('/getSelectedMedia/' + id).then((response) => {
                console.log(response)
                this.selectedMedia = response.data;
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
