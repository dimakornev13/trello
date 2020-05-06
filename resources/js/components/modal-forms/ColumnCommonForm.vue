<template>
    <div class="modal fade" id="dashboard-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" v-if="column">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="column title" v-model="column.title">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-smbtn-primary" @click="submitAction">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {mapState} from 'vuex'

    export default {
        name: "ColumnCommonForm",

        props: ['title', 'action', 'column'],

        mounted() {
            let elem = $('#dashboard-form');
            elem.modal('show');
            elem.on('hidden.bs.modal', this.back);
        },

        computed: {
            ...mapState('dashboards', ['dashboard']),
        },

        methods: {
            submitAction() {
                const form = {
                    title: this.column.title,
                    dashboard_id: this.dashboard.id
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
