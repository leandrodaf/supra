<template>
    <div>
        <div>
            <div class="alert alert-info" v-if="alunos.length == 0">
                <strong>Atenção!</strong> Essa turma ainda não tem alunos cadastrados!.
            </div>
        </div>

        <div class="overlay" id="loadingAlunos" v-show="showLoading">
            <i class="fa fa-refresh fa-spin"></i>
        </div>

        <!--<div v-if="alunos.length >= 1">-->
        <div>
            <table id="contentAlunos" class="table table-bordered">

                <thead>
                <tr>
                    <th style="width: 10px"></th>
                    <th>Aluno</th>
                    <th>Progresso</th>
                    <th style="width: 40px">Média</th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>

                <tbody>

                <tr v-for="aluno in alunos">
                    <td @click="goToAluno(aluno.id)">
                        <img :src="'/uploads/avatars/' + aluno.foto_aluno"
                             style="cursor: pointer; height: 50px; width: 50px;" data-toggle="tooltip"
                             data-placement="left"
                             title="Acessar aluno"/>
                    </td>
                    <td @click="goToAluno(aluno.id)">{{aluno.nome_aluno}}</td>
                    <td>
                        <div class="progress progress-xs">
                            <div :class="progressBar((aluno.media / quantidadeAtividade))"
                                 :style="'width: '+ (aluno.media / quantidadeAtividade) +'%'"></div>
                        </div>
                    </td>
                    <td>
                        <span :class="colorLabel((aluno.media / quantidadeAtividade))"> {{(aluno.media / quantidadeAtividade).toString().substring(0, 5)}} </span>
                    </td>
                    <td style="text-align: center;" data-toggle="tooltip" data-placement="right"
                        title="Desvincular aluno">
                        <i class="fa fa-plug" style="color: #cb2027; cursor: pointer;"
                           @click="removeAluno(aluno.id)"></i>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal remover aluno -->
        <modal-aluno-desvincular v-bind:aluno-id="aluno_id" v-bind:class-id="class_id"></modal-aluno-desvincular>
    </div>

</template>

<script>
    export default {
        name: "gradeAlunos",
        data: function () {
            return {
                total: false,
                alunos: [],
                quantidadeAtividade: 0,
                aluno_id: null,
                showLoading: true,
                class_id: parseInt($('meta[name="id-class"]').attr('content')),
                updateAlunos: false
            }
        },
        created() {
            this.getAlunos();
        },
        methods: {
            incrementTotal: function () {
                this.total += 1
            },
            removeAluno(id) {
                $('#unsync').modal('show');
                if (this.aluno_id) {
                    this.aluno_id = null;
                } else {
                    this.aluno_id = id;
                }
            },
            getAlunos() {

                this.showLoading = true;
                Vue.axios.get('/class/synchronizedStudents/' + this.class_id).then((response) => {
                    console.log(response.data.quantidade);
                    this.quantidadeAtividade = response.data.quantidade;
                    this.alunos = response.data.alunos;
                    this.showLoading = false;
                });
            },
            goToAluno(id) {
                return window.location = "/alunos/" + id;
            },
            progressBar(media) {
                if (media >= 70) {
                    return 'progress-bar progress-bar-success';
                } else if (media < 70 && media > 50) {
                    return 'progress-bar progress-bar-warning';
                } else if (media <= 50) {
                    return 'progress-bar progress-bar-danger';
                }
            },
            colorLabel(media) {
                if (media >= 70) {
                    return 'badge bg-red  bg-green';
                } else if (media < 70 && media > 50) {
                    return 'badge bg-red  bg-yellow';
                } else if (media <= 50) {
                    return 'badge bg-red  bg-red';
                }
            }
        }
    }
</script>

<style scoped>

</style>