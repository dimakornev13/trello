<template>
    <div id="app">
        <header-common v-if="isLogged" />

        <router-view/>
    </div>
</template>

<script>

    import HeaderCommon from "./views/HeaderCommon";
    import {mapGetters} from 'vuex';

    export default {
        components: {HeaderCommon},

        computed: mapGetters(['isLogged']),

        mounted() {
            let context = this;

            window.axios.interceptors.response.use(undefined, function (err) {
                return new Promise(function (resolve, reject) {

                    // if (err.status === 401 || err.config || !err.config.__isRetryRequest) {
                    if (err.status === 401) {
                        context.$store.dispatch('logout');
                    }
                });
            });

            if (context.isLogged === true){
                this.$store.dispatch('loadUser');
                this.$router.push('/dashboards');
            }
        }
    }
</script>
