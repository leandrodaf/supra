<template>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title" v-text="this.title"></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <div class="text-center">
                <pulse-loader :loading="loading" :color="spinner.color" :size="spinner.size"></pulse-loader>
                <pie-chart :data="dataPieTurma"></pie-chart>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "InfoClass",
        props: ['title'],
        data: () => {
            return {
                loading: false,
                dataPieTurma: [],
                spinner: {
                    size: '5px',
                    color: 'black',
                    loadingDefault: true
                }
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                this.loading = true;
                Vue.axios.get('/dash/secretaria/BoxTurmas').then((response) => {
                    this.dataPieTurma = response.data;
                    this.loading = false;
                });
            },
        }
    }
</script>

<style scoped>

</style>