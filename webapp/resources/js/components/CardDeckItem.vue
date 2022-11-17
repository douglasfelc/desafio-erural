<template>
    <div class="card">
        <img class="card-img-top" :src="image" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>
            <p class="card-text">{{description}}</p>
            <p class="card-text"><small class="text-muted">{{infos}}</small></p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'description', 'infos', 'image']
    }
</script>
