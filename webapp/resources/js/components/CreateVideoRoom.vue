<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="POST" action="" @submit.prevent="createVideoRoom($event)">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <card-component title="Create video room">
                        <template v-slot:body>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="" required autocomplete="title" autofocus v-model="title">
                                </div>
                            </div>
                        </template>
                    </card-component>

                    <card-component title="Select one or more videos for this room">
                        <template v-slot:body>

                            <div class="col">
                                <input id="search" type="text" class="form-control" name="search" value="" autocomplete="search" v-model="search" placeholder="Search videos">
                                {{ search }}
                            </div>

                            <table-component>
                                <template v-slot:body>
                                    <tr>
                                        <td><input type="checkbox" value="1" id="defaultCheck1"></td>
                                        <td><img class="card-img-top" src="/img/no-image.png" alt="Card image cap"></td>
                                        <td>
                                            Video 1
                                            <small class="d-block">Description 1</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" value="2" id="defaultCheck2"></td>
                                        <td><img class="card-img-top" src="/img/no-image.png" alt="Card image cap"></td>
                                        <td>
                                            Video 2
                                            <small class="d-block">Description 1</small>
                                        </td>
                                    </tr>
                                </template>
                            </table-component>

                        </template>

                        <template v-slot:footer>
                            <button type="submit" class="btn btn-primary float-right">Create</button>
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
                search: '',
                title: '',
                videos: []
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

            createVideoRoom(e) {
                let url = 'http://localhost:8000/api/v1/video_room/'

                let formData = new FormData();
                formData.append('user_id', 1)
                formData.append('title', this.title)

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

                        /*
                        let url = 'http://localhost:8000/api/v1/video_room_item/'

                        let formData = new FormData();
                        formData.append('user_id', 1)
                        formData.append('video_id', response._id)

                        axios.post(url, formData, config)
                            .then(response => {
                                console.log(response)
                            })
                            .catch(error => {
                                alert('Error: ' + error)
                                console.log('Error: ' + error)
                            })
                        */

                        alert('Video room successfully created')
                       
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
