<template>
    <div :class="stateValidator(this.stateBox)">
        <div class="box-header with-border">
            <h3 class="box-title">{{this.title}}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'stateBox'],
        name: "boxDefault",
        methods: {
            stateValidator(state) {
                if (state == true) {
                    return 'box box-primary'
                } else {
                    return 'box box-danger'
                }
            }
        }
    }
</script>

<style scoped>

</style>