<template>
    <div class="dashboards-list_wrapper" v-if="dashboardsExists">

        <div
            class="d-flex flex-row board-tile"
            :style="{backgroundImage: `url('${d.background}')`}"
            v-for="d in dashboards"
            :key="d.id">

            <div class="p-2 w-100">
                <router-link
                    class="dashboard-link"
                    :to="{name: 'singleDashboard', params: {id: d.id}}">
                    {{ d.title }}
                </router-link>
            </div>

            <div class="p-2 flex-shrink-1">
                <button type="button"
                        class="btn btn-secondary btn-sm dropdown-toggle"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        :id="`dropdownMenuButton${d.id}`">
                </button>

                <div class="dropdown-menu" :ariaLabelledby="`dropdownMenuButton${d.id}`">
                    <router-link :to="{name: 'dashboardsUpdate', params: {id: d.id}}" class="dropdown-item">Update</router-link>
                    <router-link :to="{name: 'dashboardsDelete', params: {id: d.id}}" class="dropdown-item">Delete</router-link>
                </div>
            </div>

        </div>

        <div>
            <router-link
                class="btn-primary btn"
                :to="{name: 'dashboardsCreate'}">
                create dashboard
            </router-link>
        </div>

        <router-view/>
    </div>
</template>

<script>
    import {mapActions, mapState, mapGetters} from 'vuex'

    export default {
        name: "DashboardsPage",

        mounted() {
            this.loadDashboards()
        },

        computed: {
            ...mapState('dashboards', ['dashboards']),
            ...mapGetters('dashboards', ['dashboardsExists'])
        },

        methods: {
            ...mapActions('dashboards', ['loadDashboards']),
        }
    }

</script>
