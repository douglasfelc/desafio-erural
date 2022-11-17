<template>
    <div class="container">
        <div class="row m-2">
            Welcome to video room: {{ title }}
        </div>

        <div class="row">
            <div class="col-7 p-4">
                Video list embed
            </div>

            <div class="col-5">
                <card-component title="Chat">
                    <template v-slot:body>
                        Video comments
                    </template>
                </card-component>
            </div>
        </div>

        <card-component title="Video comments">
            <template v-slot:body>
                Video comments
            </template>
        </card-component>

    </div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                title: ''
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
            load() {
                let url = 'http://localhost:8000/api/v1/video_room/'+this.id

                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                        'Authorization': this.token
                    }
                }

                axios.get(url, config)
                    .then(response => {
                        let obj = response.data
                        this.title = obj.title
                    })
                    .catch(error => {
                        alert(error)
                        console.log('Error: ' + error)
                    })
            }
        },
        mounted() {
            this.load()
        }
    }
</script>
