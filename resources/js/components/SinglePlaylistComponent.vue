<template>
    <div>
        <strong>Single playlist</strong>
        <br>
        <button @click="closePlaylist">Close</button>
        <div>{{ test.created_by }}</div>
        <div>{{ test.playlist_name }}</div>
        <div>{{ test.playlist_type }}</div>
        <br><br>
        <!-- {{test.media}} -->
        <!-- <div>{{ JSON.parse(test.media) }}</div> -->

        <!-- {{ media }} -->
        
        <div v-for="(mediaData, index) in media">
            <div>{{ index+1 }} </div>
            <div>MEDIA ID: {{ mediaData.id }}</div>
            <div>MEDIA NAME: {{ mediaData.media_name }}</div>
            <div>MEDIA TYPE: {{ mediaData.media_type }}</div>
            <div>MEDIA CREATED AT: {{ mediaData.created_at }}</div>
            <button @click="deleteFromPlaylist()">Delete from playlist</button>
            <br><br>
            
        </div>

        <!-- <div v-for="stuff in media.media">
            MEDIA NAME: {{stuff.media_name}}
            <br>
            TYPE: {{stuff.media_type}}
            <br>
            CREATED AT: {{stuff.created_at}}
            <button>Delete</button>            
            <br><br>

        </div> -->
        <br>


    </div>
</template>

<script>

export default {
    data() {
        return {}
    },

    methods: {
        closePlaylist() {
            this.$parent.showSinglePlaylist = false;
            this.$parent.library = true;
        },

        deleteFromPlaylist() {

        }
    },

    props: ['test', 'media']
}
</script>
