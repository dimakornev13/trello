<template>
    <div class="home col-md-3 offset-4">
        <form action="javascript:void(0)">

            <div class="form-group">
                <input type="email" id="email" class="form-control" v-model="email" required placeholder="email">

                <div v-if="errors.email">
                    <p class="text-danger" v-for="message in errors.email">{{ message }}</p>
                </div>
            </div>

            <div class="form-group">
                <input type="password" id="password" class="form-control" v-model="password" required placeholder="password">

                <div v-if="errors.password">
                    <p class="text-danger" v-for="message in errors.password">{{ message }}</p>
                </div>
            </div>

            <button type="button" class="btn btn-primary" @click="login">login</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'Home',

        data: () => ({
            email: 'user-2@none.com',
            password: 'test',
            errors: {}
        }),

        methods: {
            login() {

                this.errors = {};

                this.$store.dispatch('login', {
                    email: this.email,
                    password: this.password
                }).catch(e => {
                    if(e && e.response.data.errors)
                        this.errors = e.response.data.errors
                })
            }
        }
    }
</script>
