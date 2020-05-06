<template>
    <div class="column-wrapper">
        <div class="column-item_sortable">
            <div class="d-flex flex-row justify-content-between">
                <router-link class="column-title text-left font-weight-bold"
                             :to="{name: 'columnUpdate', params:{columnID: column.id}}">
                    {{ column.title }}
                </router-link>

                <router-link class="column-title text-left font-weight-bold"
                             :to="{name: 'columnDelete', params:{columnID: column.id}}">
                    &times;
                </router-link>
            </div>

            <draggable v-if="column.tasks"
                       group="tasks"
                       draggable=".column-task"
                       v-model="tasks">

                <div class="column-task d-flex flex-row justify-content-between align-self-start"
                     v-for="task in column.tasks"
                     :key="task.id">

                    <router-link :to="{name: 'taskUpdate', params: {columnID: column.id, id: column.dashboard_id, taskID: task.id}}">{{ task.title }}</router-link>
                    <router-link class="task-delete" :to="{name: 'taskDelete', params: {columnID: column.id, id: column.dashboard_id, taskID: task.id}}">&times;</router-link>
                </div>

                <router-link :to="{name: 'taskCreate', params: {columnID: column.id, id: column.dashboard_id}}"
                             class="btn btn-primary width-100"
                             slot="footer">
                    Add task
                </router-link>
            </draggable>

        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import {mapActions} from 'vuex';

    export default {
        name: "ColumnList",

        props: ['column'],

        components: {
            draggable
        },

        computed: {
            tasks: {
                get() {
                    return this.column.tasks
                },
                set(newTasks) {
                    this.$store.dispatch('column/setNewTasks', {
                        ...this.column,
                        tasks: newTasks
                    })
                }
            }
        },

    }
</script>
