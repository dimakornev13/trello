<template>
    <div>
        <task-form :action="updateTask" :title="title" :task="task" :column="column"/>
    </div>
</template>

<script>
    import TaskForm from "./TaskForm";
    import {mapActions, mapState} from "vuex";

    export default {
        name: 'TaskUpdate',

        created() {
            this.$store.commit('column/SET_SINGLE_COLUMN', this.$route.params.columnID);
            this.$store.dispatch('task/setSingleTask', this.$route.params.taskID);
        },

        components: {
            TaskForm
        },

        computed: {
            ...mapState('task', ['task']),
            ...mapState('column', ['column']),

            title() {
                return 'Updating task'
            }
        },

        methods: {
            ...mapActions('task', ['updateTask']),
        }
    }
</script>
