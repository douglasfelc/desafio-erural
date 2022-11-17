<template>
    <div class="container">

        <div class="col">
            <input id="search" type="text" class="form-control" name="search" value="" autocomplete="search" v-model="search" placeholder="Search video rooms">
            {{search}}
        </div>

        <table-component>
            <template v-slot:body>
                <tr v-for="r in videoRooms" :key="r.id" class="cursor-pointer">
                    <td>{{r.title}}</td>
                    <td class="text-right">
                        <a :href="'/video-room/'+r.id">Enter the room</a>
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
                videoRooms: []
            }
        },
        methods: {
            load() {
                let url = 'http://localhost:8000/api/v1/video_room/'
                axios.get(url)
                    .then(response => {
                        this.videoRooms = response.data
                        console.log(response.data)
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
