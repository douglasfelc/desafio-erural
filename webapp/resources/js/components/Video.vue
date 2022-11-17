<template>
    <div class="container">
        Video embed: {{ video }}

        <div class="row m-2">
            {{ title }}
        </div>

        <div class="row m-2 small">
            {{ description }}
        </div>

        <card-component title="Comments">
            <template v-slot:body>
                Comments
            </template>
        </card-component>

    </div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                video: '',
                title: '',
                description: ''
            }
        },
        methods: {
            load() {
                let url = 'http://localhost:8000/api/v1/video/'+this.id

                axios.get(url)
                    .then(response => {
                        let obj = response.data
                        this.title = obj.title
                        this.description = obj.description
                        this.video = obj.url
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
