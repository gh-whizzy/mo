<template>
    <div>
        <div v-if="uploadForm">
            <strong>Playlists</strong>
            <br><br>

            <button @click="close()">
                Close
            </button>
            
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <label for="">Add media</label>
                <input type="file" @change="onChange">
                <input type="submit" value="upload">
            </form>
        </div>

        
        <div v-if="allMedia">
            <div v-for="media in test1">
                <br>
                <div class="card">

                    <div>
                        MEDIA NAME: {{media.media_name}} <br> 
                    </div>
                    
                    <div>
                        MEDIA TYPE: {{media.media_type}}<br><br>
                    </div>
                    
                    <button @click="view(media.id)">
                        View Media
                    </button>

                    <button 
                        @click="deleteMedia(media.id)" 
                        :data-cy="'delete-media-btn-' + media.id"
                    >
                        Delete Media
                    </button>

                    <button>Edit Media</button>
                </div>
            </div>
        </div>        

        <div v-if="viewSelectedMedia">
            <div>Media Name: {{ test2.media_name }}</div>
            <div>Media Type: {{ test2.media_type }}</div>
            <div>Media File: {{ test2.file_path }}</div>

            <button @click="closeSelectedMedia">
                Close
            </button>
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

            // Last mintue addition to find manually test
            // where my data was
            test2: null,

            allMedia: true,
            uploadForm: true
        }
    },

    props: ['playlistData1', 'test1'],

    methods: {
        view(id) {
            this.viewSelectedMedia = true;
            axios.get('/getSelectedMedia/' + id).then((response) => {          
                this.test2 = response.data;
                this.allMedia = false;
                this.uploadForm = false;
            })
        },

        closeSelectedMedia() {
            this.allMedia = true;
            this.viewSelectedMedia = false;
            this.uploadForm = true;

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
            this.viewSelectedMedia = false;
        },

        
        onChange(e) {
            console.log("selected file", e.target.files[0]);
            this.file = e.target.files[0];
            this.playlistId = this.$props.test1[0].playlist_id;
        },

        submit() {
            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('playlist_id', this.playlistId);

            axios.post('/upload', formData).then((response) => {
                console.log('response', response.data);
            }).catch((error) => {
                console.log(error);
            })
        }
    },
}
</script>
