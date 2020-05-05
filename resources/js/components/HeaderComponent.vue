<template>
    <div id="header" class="text-right" v-if="authenticated">
        {{ user.name }}
    </div>
</template>

<script>
    import {mapGetters, mapState} from 'vuex'

    export default {
        name: "HeaderComponent",

        computed: {
            ...mapGetters('auth', ['authenticated']),
            ...mapState('auth', ['user'])
        }
    }
</script>
