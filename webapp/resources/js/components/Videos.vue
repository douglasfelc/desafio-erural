<template>
    <div class="container">

        <div class="col">
            <input id="search" type="text" class="form-control" name="search" value="" autocomplete="search" v-model="search" placeholder="Search videos">
            {{search}}
        </div>

        <table-component>
            <template v-slot:body>
                <tr v-for="v in videos" :key="v.id" class="cursor-pointer" @click="redirect(v.id)">
                    <td style="width: 40%;"><img class="card-img-top" src="/img/no-image.png" alt="Card image cap"></td>
                    <td style="width: 60%;">
                        {{v.title}}
                        <small class="d-block">{{v.description}}</small>
                    </td>
                </tr>
            </template>
        </table-component>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                search: '',
                videos: []
            }
        },
        methods: {
            load() {
                let url = 'http://localhost:8000/api/v1/video/'
                axios.get(url)
                    .then(response => {
                        this.videos = response.data
                        console.log(response.data)
                    })
                    .catch(error => {
                        alert(error)
                        console.log('Error: ' + error)
                    })
            },
            redirect(id) {
                window.open('/video/'+id, '_self')
            }
        },
        mounted() {
            this.load()
        }
    }
</script>
