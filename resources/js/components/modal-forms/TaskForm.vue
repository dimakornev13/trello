<template>
    <div class="modal fade" id="dashboard-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" v-if="task">
        <div class="modal-dialog" role="document">
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="submitAction">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ColumnCommonForm",

        props: ['title', 'action', 'column', 'task'],

        mounted() {
            let elem = $('#dashboard-form');
            elem.modal('show');
            elem.on('hidden.bs.modal', this.back);
        },

        methods: {
            submitAction() {
                const form = {
                    ...this.task,
                };

                this.action(form);

                $('#dashboard-form').modal('hide');
            },


            back() {
                this.$router.go(-1);
            }
        }
    }
</script>
