<template>
    <div>
        <button @click="closePlaylist">Close</button>
        single playlist
        <div>{{ test.created_by }}</div>
        <div>{{ test.playlist_name }}</div>
        <div>{{ test.playlist_type }}</div>
        <!-- <div>{{ JSON.parse(test.media) }}</div> -->
        <div v-for="media in JSON.parse(test.media)">
            MEDIA NAME: {{media.media_name}}
            <br>
            TYPE: {{media.media_type}}
            <br>
            CREATED AT: {{media.created_at}}
            <button>Delete</button>            <br><br>

        </div>
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
        }
    },

    props: ['test']
}
</script>
