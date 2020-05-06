<template>
    <div class="modal fade" id="dashboard-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" v-if="task">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="task title" v-model="task.title">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="task description" v-model="task.description"></textarea>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" @click="submitAction">Send</button>
                    </div>

                    <task-comments class="task-comments" :task="task" v-if="task.comments.length"/>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import TaskComments from "../TaskComments";

    export default {
        name: "TaskForm",

        components: {
            TaskComments
        },

        props: ['title', 'action', 'column', 'task'],

        updated() {
            if (this.task !== null) {
                let elem = $('#dashboard-form');
                elem.modal('show');
                elem.on('hidden.bs.modal', this.back);
            }
        },

        methods: {
            submitAction() {
                this.action({...this.task});

                $('#dashboard-form').modal('hide');
            },

            back() {
                this.$router.go(-1);
            }
        }
    }
</script>
