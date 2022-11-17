<template>
    <div>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col" v-for="t, key in titles" :key="key">{{t}}</th>
                </tr>
            </thead>
            <tbody>
                <slot name="body"></slot>
            </tbody>
        </table>
        {{titles}}
    </div>
</template>

<script>
    export default {
        props: ['titles']
    }
</script>
