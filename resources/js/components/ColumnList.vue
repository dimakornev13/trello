<template>
    <div class="column-wrapper">
        <div class="column-item_sortable">
            <div class="column-title text-left font-weight-bold">{{ column.title }}</div>

            <draggable
                v-if="column.tasks"
                group="tasks"
                draggable=".column-task"
                v-model="column.task">

                <div class="column-task text-left"
                     v-for="task in column.tasks"
                     :key="task.id">
                    {{ task.title }}
                </div>

                <button class="btn btn-primary width-100" slot="footer">Add column</button>
            </draggable>

        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "ColumnList",

        props:['column'],

        components: {
            draggable
        }

    }
</script>
