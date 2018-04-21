<template>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title" v-text="this.title"></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" id="messageSecretariaTables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Assunto</th>
                            <th>Exibido até</th>
                            <th>Tipo</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "InfoNotifications",
        props: ['title'],
        mounted: () => {

        }
    }
</script>

<style scoped>

</style>