<template>
    <div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <quadradeco :show="loadingSpinnet" :data="turmasAbertas" :icon="'fa-graduation-cap'"
                        :title="'Turmas Ativas'"
                        :color="'bg-aqua'"></quadradeco>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <quadradeco :show="loadingSpinnet" :data="funcionarios" :icon="'fa-users'"
                        :title="'Funcionários'"
                        :color="'bg-red'"></quadradeco>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <quadradeco :show="loadingSpinnet" :data="totalAlunos" :icon="'fa-child'"
                        :title="'Total de Alunos'"
                        :color="'bg-green'"></quadradeco>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <quadradeco :show="loadingSpinnet" :data="numeroSalas" :icon="'fa-institution'"
                        :title="'Número de Salas'"
                        :color="'bg-yellow'"></quadradeco>
        </div>

    </div>

</template>

<script>
    export default {
        name: "infoBox",
        data: () => {
            return {
                turmasAbertas: null,
                funcionarios: null,
                totalAlunos: null,
                numeroSalas: null,
                loadingSpinnet: true
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                this.loadingSpinnet = true;
                Vue.axios.get('/dash/secretaria/topBox').then((response) => {
                    this.turmasAbertas = response.data.turmas;
                    this.funcionarios = response.data.funcionarios;
                    this.totalAlunos = response.data.alunos;
                    this.numeroSalas = response.data.salas;
                    this.loadingSpinnet = false;
                });
            },
        }
    }
</script>

<style scoped>

</style>