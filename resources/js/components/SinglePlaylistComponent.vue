<template>
    <div>
        <button @click="closePlaylist">Close</button>
        single playlist
        <div>{{ test.playlist_name }}</div>
        <div>{{ test.playlist_type }}</div>
        <div>{{ JSON.parse(test.media) }}</div>
        <div>{{ test.created_by}}</div>
        {{test}}

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
