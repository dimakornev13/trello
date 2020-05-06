<template>
    <div class="modal fade" id="dashboard-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="dashboard title" v-model="dashboard.title">
                    </div>
                    <div class="form-group">
                        <label for="background">Background</label>
                        <br>
                        <input type="file" id="background" @change="backgroundHasBeenChosen">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn  btn-sm btn-primary" @click="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import dashboards from "../../store/modules/dashboards";

    export default {
        name: "DashboardFormCommon",

        props: ['action', 'dashboard', 'title'],

        mounted() {
            let elem = $('#dashboard-form');
            elem.modal('show');
            elem.on('hidden.bs.modal', this.back);
        },

        data(){
            return {
                background: null
            }
        },

        methods: {

            submit() {
                let form = new FormData;
                form.append('title', this.dashboard.title)

                if(this.background)
                    form.append('background', this.background)

                // call function presented as parameter
                this.action(form);

                $('#dashboard-form').modal('hide');
            },

            backgroundHasBeenChosen(e) {
                var files = e.target.files || e.dataTransfer.files;

                if (!files.length)
                    return;

                this.background = files[0];
            },

            back() {
                this.$router.go(-1);
            }
        }
    }
</script>
