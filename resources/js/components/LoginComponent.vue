<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">Username or Email</label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control" v-model="login" required autofocus>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password" required>

                                <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" @click="sendLoginRequest">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                login: '',
                password: '',
            }
        },
        computed:{
            combined(){
                return this.login + this.password
            }
        },
        methods: {
            sendLoginRequest() {
                let login = this.login;
                let password = this.password;

                axios.post('/api/login', {login, password}).then((response) => {
                    console.log(response.data.success)
                    if(response.data.success === true){
                        localStorage.setItem('api_token', response.data.data.api_token)
                        this.$router.push('/')
                    }
                }).catch(function (err) {
                    console.log(err)
                })
            }
        }
    }

</script>

<style>

</style>
