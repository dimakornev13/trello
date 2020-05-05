<template>
    <div v-if="dashboard">
        <dashboard-form-common :dashboard="dashboard" :action="updateDashboard" :title="title"/>
    </div>
</template>

<script>
    import DashboardFormCommon from "./DashboardFormCommon";
    import {mapState, mapActions} from 'vuex'

    export default {
        name: "DashboardsUpdate",

        created() {
            this.$store.commit('dashboards/SET_SINGLE_DASHBOARD', this.$route.params.id);
        },

        components: {
            DashboardFormCommon
        },

        computed: {
            ...mapState('dashboards', ['dashboard']),

            title(){
                return 'Edit dashboard ' + this.dashboard.title
            }
        },

        methods: {
            ...mapActions('dashboards', ['updateDashboard']),
        }
    }
</script>
