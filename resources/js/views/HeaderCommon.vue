<template>
    <header id="header" v-if="user">{{ user.name }}</header>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: "HeaderCommon",

        computed: mapState({
            user: state => state.auth.user
        }),
    }
</script>

<style scoped>
    #header {
        background: #026aa7;
        overflow: hidden;
        padding: 4px;
        z-index: 10;
        height: 32px;
        position: relative;

        color: #fff;
    }
</style>
