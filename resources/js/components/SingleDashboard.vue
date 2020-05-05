<template>
    <div id="single-dashboard_wrapper" v-if="dashboard">
        <h1 class="text-left">{{ dashboard.title }}</h1>


        <draggable id="columns"
                   v-model="columns"
                   class="d-flex"
                   group="columns"
                   draggable=".column-wrapper">

            <column-list v-for="column in columns" :key="column.id" :column="column" />

            <div class="column-btn_wrapper" slot="footer">
                <button class="btn btn-primary width-100">Add column</button>
            </div>

        </draggable>

    </div>
</template>

<script>
    import {mapActions, mapState, mapGetters} from 'vuex'
    import draggable from 'vuedraggable'
    import ColumnList from "./ColumnList";

    export default {
        name: "SingleDashboard",

        components: {
            draggable,
            ColumnList
        },

        mounted() {
            this.loadSingleDashboard(this.$route.params)
        },

        computed: {
            ...mapState('dashboards', ['dashboard']),

            columns: {
                get() {
                    return this.$store.state.column.columns;
                },
                set(newSetColumns) {
                    // todo change to dispatch
                    this.$store.commit('column/SET_COLUMNS', newSetColumns)
                }
            },
        },

        methods: {
            ...mapActions('dashboards', ['loadSingleDashboard']),
        }
    }
</script>
