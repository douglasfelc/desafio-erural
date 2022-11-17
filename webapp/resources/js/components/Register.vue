<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="POST" action="" @submit.prevent="register($event)">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <card-component title="Register">
                        <template v-slot:body>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus v-model="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" v-model="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" v-model="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="password_confirm">
                                </div>
                            </div>

                        </template>

                        <template v-slot:footer>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </template>
                    </card-component>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['csrf_token'], 
        data() {
            return {
                name: '',
                email: '',
                password: '',
                password_confirm: ''
            }
        },
        methods: {
            register(e) {

                if( this.password != this.password_confirm ){
                    alert('Passwords don\'t match')
                    return false
                }

                let url = 'http://localhost:8000/api/v1/user/'
                let config = {
                    method: 'post',
                    body: new URLSearchParams ({
                        'name': this.name,
                        'email': this.email,
                        'password': this.password
                    })
                }

                fetch(url, config)
                    .then(response => response.json())
                    .then(data => {
                        if(data.token) {
                            document.cookie = 'token='+data.token+';SameSite=Lax'
                        }

                        console.info(data);

                        // submit form
                        //e.target.submit()
                    })
            }
        }
    }
</script>
