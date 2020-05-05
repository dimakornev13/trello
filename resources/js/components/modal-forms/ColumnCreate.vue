<template>
    <div>
        <column-common-form :action="createColumn" :title="title" :column="{}"/>
    </div>
</template>

<script>
    import ColumnCommonForm from "./ColumnCommonForm";
    import {mapActions, mapState} from "vuex";

    export default {
        name: 'ColumnUpdate',

        components: {
            ColumnCommonForm
        },

        computed: {
            title(){
                return 'Creating column'
            }
        },

        methods: {
            ...mapActions('column', ['createColumn']),
        }
    }
</script>
