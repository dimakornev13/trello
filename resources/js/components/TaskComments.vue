<template>
    <div>
        <div class="form-group">
            <textarea v-model="newComment" class="form-control" rows="3"></textarea>

        </div>
        <div class="form-group">
            <div class="text-right">
                <button class="btn btn-sm btn-primary" @click="addCommentAction">Add comment</button>
            </div>
        </div>

        <div id="comments">
            <h4>Comments</h4>

            <div v-for="comment in task.comments" :key="comment.id">

                <div class="comment-user">
                    <div class="d-flex justify-content-between">

                        <h5><b>{{ comment.user.name }}</b> {{ comment.created_at | date }}</h5>

                        <button class="delete-comment_btn btn btn-sm"
                                v-if="user.id === comment.owner_id"
                                @click="deleteCommentAction(comment)">
                            &times;
                        </button>

                    </div>

                    <div>{{ comment.content }}</div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapState} from 'vuex'

    export default {
        name: "TaskComments",

        props: ['task'],

        computed: {
            ...mapState('auth', ['user'])
        },

        data: () => {
            return {
                newComment: ''
            }
        },

        methods: {
            ...mapActions('comment', ['addComment', 'deleteComment']),

            addCommentAction() {
                this.addComment({
                    content: this.newComment,
                    task_id: this.task.id
                })
            },

            deleteCommentAction(comment){
                this.deleteComment(comment)
            }
        }
    }
</script>
