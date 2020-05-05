<template>
    <div>
        <column-common-form :action="updateColumn" :title="title" :column="column"/>
    </div>
</template>

<script>
    import ColumnCommonForm from "./ColumnCommonForm";
    import {mapActions, mapState} from "vuex";

    export default {
        name: 'ColumnUpdate',

        created() {
            this.$store.commit('column/SET_SINGLE_COLUMN', this.$route.params.columnID);
        },

        components: {
            ColumnCommonForm
        },

        computed: {
            ...mapState('column', ['column']),

            title(){
                return 'Updating column ' + this.column.title
            }
        },

        methods: {
            ...mapActions('column', ['updateColumn']),
        }
    }
</script>
