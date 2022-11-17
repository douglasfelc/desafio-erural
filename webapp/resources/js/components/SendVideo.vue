<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="POST" action="" @submit.prevent="sendVideo($event)">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <card-component title="Send your video">
                        <template v-slot:body>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="" required autocomplete="title" autofocus v-model="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="" required autocomplete="description" v-model="description">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>
                                <div class="col-md-6">
                                    <input id="url" type="text" class="form-control" name="url" required autocomplete="url" v-model="url">
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
                title: '',
                description: '',
                url: ''
            }
        },
        computed: {
            token() {
                let token = document.cookie.split(';').find(index => {
                    return index.includes('token=')
                })

                token = token.split('=')[1]
                token = 'Bearer ' + token
                return token
            }
        },
        methods: {

            sendVideo(e) {
                let url = 'http://localhost:8000/api/v1/video/'

                let formData = new FormData();
                formData.append('user_id', 1)
                formData.append('title', this.title)
                formData.append('description', this.description)
                formData.append('url', this.url)

                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                        'Authorization': this.token
                    }
                }

                axios.post(url, formData, config)
                    .then(response => {
                        console.log(response)
                        alert('Video sent successfully')
                       
                        // submit form
                        //e.target.submit()
                    })
                    .catch(error => {
                        alert(error)
                        console.log('Error: ' + error)
                    })

            }
        }
    }
</script>
