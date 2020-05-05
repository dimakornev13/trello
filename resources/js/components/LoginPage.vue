<template>
    <div class="d-flex justify-content-center text-center">
        <div class="col-md-4 wrapper Down">
            <div id="formContent">

                <!-- Login Form -->
                <form>
                    <input type="text" id="login" class=" second custom-input" placeholder="login" v-model="form.email" required>
                    <input type="password" id="password" class=" third custom-input" placeholder="password" v-model="form.password" required>
                    <input type="button" class=" fourth" value="Log In" @click="attempt">
                </form>

            </div>
        </div>

    </div>
</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        name: "LoginPage",

        data: () => ({
            form: {
                email: 'user-2@none.com',
                password: 'test'
            }
        }),

        methods: {
            ...mapActions({
                login: 'auth/login'
            }),

            attempt() {
                this.login(this.form)
            }
        }
    }
</script>
