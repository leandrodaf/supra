<template>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title" v-text="this.title"></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <column-chart :data="dataPieTurma"></column-chart>
        </div>
    </div>

</template>

<script>
    export default {
        name: "yearClass",
        props: ['title'],
        data: () => {
            return {
                dataPieTurma: [],
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                // this.spinner.loading = true;
                Vue.axios.get('/dash/secretaria/dataAlunosxAlunos').then((response) => {
                    console.log();
                    this.dataPieTurma = response.data;
                    // this.spinner.loading = false;
                });
            },
        }
    }
</script>

<style scoped>

</style>