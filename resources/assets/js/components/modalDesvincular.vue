<template>
    <div class="modal fade in" id="unsync" tabindex="-1" role="dialog"
         aria-hidden="true" :style="{'display: block; padding-right: 15px;': isActive, '': !isActive}">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Desvincular aluno?</strong></h5>
                </div>
                <div class="modal-body text-center">

                    <div class="alert alert-warning">
                        <i id="alertDelete" class="fa fa-exclamation" style="font-size:80px; color: #333;"></i>
                        <p></p>
                        <strong>Atenção!</strong> Você realmente deseja remover esse aluno?
                    </div>

                    <p></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button @click="removeAluno(alunoId, classId)" type="button" value="" class="btn btn-warning">
                        Desvincular
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "modalDesvincular",
        props: ['alunoId', 'classId'],
        data: function () {
            return {
                isActive: true,
            }
        },
        methods: {
            removeAluno(aluno, yearclass) {
                console.log("Aluno" + aluno);
                console.log("Classe" + yearclass);
                Vue.axios.post(`/class/syncAluno`, {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    body: {'idAluno': aluno, 'idClass': yearclass}
                })
                    .then(response => {
                        this.isActive = false;
                        console.log(response)
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        }
    }
</script>

<style scoped>

</style>