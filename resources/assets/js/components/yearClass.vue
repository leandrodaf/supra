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
                <column-chart :data="dataPieTurma"></column-chart>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "yearClass",
        props: ['title'],
        data: () => {
            return {
                loading: true,
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
                Vue.axios.get('/dash/secretaria/dataAlunosxAlunos').then((response) => {
                    this.dataPieTurma = response.data;
                    this.loading = false;
                });
            },
        }
    }
</script>

<style scoped>

</style>