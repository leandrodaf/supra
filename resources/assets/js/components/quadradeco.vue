<template>
    <div class="info-box">
        <span :class="'info-box-icon ' + this.color">
            <i :class="'fa ' + this.icon"></i>
        </span>

        <div class="info-box-content">
            <span class="info-box-text" v-text="this.title"></span>
            <span class="info-box-number" v-text="this.data"></span>
            <pulse-loader :loading="this.show" :color="spinner.color" :size="spinner.size"></pulse-loader>
        </div>
    </div>
</template>

<script>
    export default {
        name: "quadradeco",
        props: ['icon', 'title', 'show', 'data', 'color'],
        data: () => {
            return {
                spinner: {
                    size: '5px',
                    color: 'black',
                    loadingDefault: true
                }
            }
        }
    }
</script>

<style scoped>

</style>