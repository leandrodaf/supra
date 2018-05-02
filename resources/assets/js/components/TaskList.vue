<template>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> Visitas</h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <form action="#" @submit.prevent="createTask()">
                <div class="input-group">
                    <input placeholder="Nova visita" v-model="task.body" type="text" name="body" class="form-control" autofocus>
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Incluir</button>
                </span>
                </div>
            </form>
            <hr />
            <h4>Lista de visitas</h4>
            <ul class="list-group">
                <div v-if='list.length === 0' class="alert alert-warning">
                    Lista de visitas vázia!
                </div>

                <li class="list-group-item" v-for="(task, index) in list">
                    {{ task.body }}
                    <button @click="deleteTask(task.id)" class="btn btn-danger btn-xs pull-right">Remover</button>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                list: [],
                task: {
                    id: '',
                    body: ''
                }
            };
        },

        created() {
            this.fetchTaskList();
        },

        methods: {
            fetchTaskList() {
                this.axios.get('/tasks').then((res) => {
                    this.list = res.data;
                });
            },

            createTask() {
                this.axios.post('/tasks', this.task)
                    .then((res) => {
                        this.task.body = '';
                        this.edit = false;
                        this.fetchTaskList();
                    })
                    .catch((err) => console.error(err));
            },

            deleteTask(id) {
                this.axios.delete('/tasks/' + id)
                    .then((res) => {
                        this.fetchTaskList()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>
