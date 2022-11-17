<template>
    <div>
        <strong>Single Playlist</strong>
        <div v-for="file in media">
            {{ file.id }}
            {{ file.playlist_id }}
            {{ file.media_name }}
            {{ file.media_type }}    
        </div>
        <button @click="close()">Close</button>

        <!-- <strong>Single playlist</strong>
        <br>
        <button @click="closePlaylist">Close</button>
        <div>{{test.id}}</div>
        <div>{{ test.created_by }}</div>
        <div>{{ test.playlist_name }}</div>
        <div>{{ test.playlist_type }}</div>
        <br><br>

        <div v-for="(mediaData, index) in media">
            <div>{{ index+1 }} </div>
            <div>MEDIA ID: {{ mediaData.id }}</div>
            <div>MEDIA NAME: {{ mediaData.media_name }}</div>
            <div>MEDIA TYPE: {{ mediaData.media_type }}</div>
            <div>MEDIA CREATED AT: {{ mediaData.created_at }}</div>

            <button @click="deleteFromPlaylist(test.id, mediaData.id)">Delete from playlist</button>
            <br><br>
            
        </div>


        <br>
 -->

    </div>
</template>

<script>

export default {
    data() {
        return {}
    },

    methods: {
        close() {
            this.$parent.library = true;
            this.$parent.showSinglePlaylist = false;
            this.$parent.showEditPlaylist = false;
        },
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
