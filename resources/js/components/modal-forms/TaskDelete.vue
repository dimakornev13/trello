<template>
    <div class="modal fade" id="dashboard-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" v-show="task">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete the Dashboard: <b>{{ task.title }}</b></h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="deleteAction">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex'

    export default {
        name: "TaskDelete",

        created() {
            this.$store.commit('column/SET_SINGLE_COLUMN', this.$route.params.columnID);
            this.$store.dispatch('task/setSingleTask', this.$route.params.taskID);
        },

        mounted() {
            let elem = $('#dashboard-delete');
            elem.modal('show');
            elem.on('hidden.bs.modal', this.back);
        },


        computed: {
            ...mapState('task', ['task'])
        },

        methods: {
            ...mapActions('task', ['deleteTask']),

            deleteAction() {
                this.deleteTask(this.task);
                $('#dashboard-delete').modal('hide');
            },

            back() {
                this.$router.go(-1);
            }
        }
    }
</script>
