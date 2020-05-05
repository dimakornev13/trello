<template>
    <div>
        <dashboard-form-common :dashboard="{}" :action="createDashboard" :title="title"/>
    </div>
</template>

<script>
    import DashboardFormCommon from "./DashboardFormCommon";
    import {mapActions, mapState} from "vuex";

    export default {
        name: "DashboardCreateForm",

        components: {
            DashboardFormCommon
        },

        computed: {
            title(){
                return 'Creating dashboard'
            }
        },

        methods: {
            ...mapActions('dashboards', ['createDashboard']),
        }
    }
</script>
