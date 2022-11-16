<template>
    <div @click="showData()">
        single playlist
        <div>{{ test.playlist_name }}</div>
        <div>{{ test.playlist_type }}</div>
        <div>{{ test.media }}</div>
        <div>{{ test.created_by}}</div>

    </div>
</template>

<script>

export default {
    data() {
        return {}
    },

    methods: {
        showData() {
            // console.log(this.$props.test.selectedPlaylist)
        }
    },

    props: ['test']
}
</script>
