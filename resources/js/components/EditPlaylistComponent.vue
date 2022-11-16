<template>
    <div>
        edit
    </div>
    <button @click="closeForm()">Close</button>
</template>

<script>
export default {
    data() {
        return {}
    },

    methods: {
        closeForm() {
            this.$parent.editPlaylist = false;
            this.$parent.showSinglePlaylist = false;
            this.$parent.library = true;
        }
    },

    props: ['test']
}
</script>
