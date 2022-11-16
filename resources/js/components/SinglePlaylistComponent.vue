<template>
    <div>
        <button @click="closePlaylist">Close</button>
        single playlist
        <div>{{ test.playlist_name }}</div>
        <div>{{ test.playlist_type }}</div>
        <div>{{ JSON.parse(test.media) }}</div>
        <div>{{ test.created_by}}</div>

    </div>
</template>

<script>

export default {
    data() {
        return {}
    },

    methods: {
        closePlaylist() {
            this.$parent.showPlaylist = false;
        }
    },

    props: ['test']
}
</script>
