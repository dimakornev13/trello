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
                       v-model="column.task">

                <div class="column-task text-left"
                     v-for="task in column.tasks"
                     :key="task.id">
                    {{ task.title }}
                </div>

                <router-link :to="{name: 'columnCreate'}"
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

    export default {
        name: "ColumnList",

        props: ['column'],

        components: {
            draggable
        },

        methods: {}
    }
</script>
