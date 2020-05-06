<template>
    <div>
        <task-form :action="createTask" :title="title" :column="column" :task="{dashboard_id: dashboard_id, column_id: column_id}"/>
    </div>
</template>

<script>
    import TaskForm from "./TaskForm";
    import {mapActions, mapState} from "vuex";

    export default {
        name: 'TaskCreate',

        created() {
            this.$store.commit('column/SET_SINGLE_COLUMN', this.$route.params.columnID);
        },

        components: {
            TaskForm
        },

        computed: {
            ...mapState('column', ['column']),

            dashboard_id() {
                return this.$route.params.id
            },

            column_id() {
                return this.$route.params.columnID
            },

            title() {
                return 'Creating task'
            }
        },

        methods: {
            ...mapActions('task', ['createTask']),
        }
    }
</script>
