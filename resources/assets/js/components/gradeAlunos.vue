<template>
    <div>
        <div>
            <div class="alert alert-info" v-if="alunos.length == 0">
                <strong>Atenção!</strong> Essa turma ainda não tem alunos cadastrados!.
            </div>
        </div>

        <div v-if="alunos.length >= 1">
            <div class="overlay" id="loadingAlunos" v-show="showLoading">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
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
                    <td @click="goToAluno(aluno.id)"><img :src="'/uploads/avatars/' + aluno.foto_aluno"
                                                          style="height: 50px; width: 50px;"/></td>
                    <td @click="goToAluno(aluno.id)">{{aluno.nome_aluno}}</td>
                    <td>
                        <div class="progress progress-xs">
                            <div :class="progressBar(aluno.media)" :style="'width: '+ aluno.media +'%'"></div>
                        </div>
                    </td>
                    <td>
                        <span :class="colorLabel(aluno.media)"> {{aluno.media}} </span>
                    </td>
                    <td style="text-align: center;" data-toggle="tooltip" data-placement="right"
                        title="Desvincular aluno">
                        <i class="fa fa-plug" :data-id="aluno.id" style="color: #cb2027; cursor: pointer;"
                           data-toggle="modal" @click="removeAluno(aluno.id)" data-target="#unsync"
                           :data-aluno-id="aluno.id"></i>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal remover aluno -->
        <modal-aluno-desvincular aluno-id="1" class-id="1"></modal-aluno-desvincular>
    </div>

</template>

<script>
    export default {
        name: "gradeAlunos",
        data: function () {
            return {
                alunos: [],
                aluno_id: 1,
                showLoading: true,
                class_id: parseInt($('meta[name="id-class"]').attr('content'))
            }
        },
        created() {
            this.getAlunos();
        },
        methods: {
            removeAluno(id) {
                if (this.aluno_id) {
                    this.aluno_id = null;
                } else {
                    this.aluno_id = id;
                }
            },
            getAlunos() {
                this.showLoading = true;
                Vue.axios.get('/class/synchronizedStudents/' + this.class_id).then((response) => {
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