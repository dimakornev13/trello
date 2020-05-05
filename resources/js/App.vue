<template>
    <div id="app">

        <header-component/>
        <div id="nav" class="text-center" v-if="!authenticated">
            <router-link to="/">Home</router-link>
            |
            <router-link
                :to="{name: 'login'}">
                Login
            </router-link>
        </div>

        <router-view/>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    import HeaderComponent from "./components/HeaderComponent";

    export default {
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
            })
        },

        components:{
            HeaderComponent
        }
    }
</script>
