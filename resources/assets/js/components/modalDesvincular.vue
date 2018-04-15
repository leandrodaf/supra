<template>
    <div class="modal fade" id="unsync" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Desvincular aluno?</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-warning">
                        <i id="alertDelete" class="fa fa-exclamation" style="font-size:80px; color: #333;"></i>
                        <p></p>
                        <strong>Atenção!</strong> Você realmente deseja remover esse aluno?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button @click="removeAluno(alunoId, classId)" type="button" class="btn btn-primary">Remover
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
        methods: {
            removeAluno(aluno, yearclass) {
                this.axios.post('/class/unsyncAluno', {
                    body: {'aluno': aluno, 'idClass': yearclass}
                }).then(response => {
                    $('#unsync').modal('hide');
                    location.reload();
                }).catch(function (serror) {
                    if (error.response) {
                        console.log("data");
                        console.log(error.response.data);
                        console.log("status");
                        console.log(error.response.status);
                        console.log("headers");
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log("request");
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                });
            }
        }
    }
</script>

<style scoped>

</style>