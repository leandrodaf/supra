
<!-- RECADOS -->
<div class="box box-primary">
  <div class="box-header">
    <i class="ion ion-clipboard"></i>

    <h3 class="box-title">Recados</h3>

     
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    
    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
    <table class="table table-striped table-bordered dt-responsive nowrap" id="recados-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Descrição</th>
            <th>Data do recado</th>
            <th>Ação</th>
            
            
        </tr>
        </thead>
        <tbody>
        </tbody>
  </table>
    


      
  
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix no-border">
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Adicionar recado
              </button>
  </div>
</div>
<!-- /.box -->
<!-- FIM RECADOS -->

<!-- modal adicionar recado -->

@include('messages.create')



<!-- final adicionar modal recado -->        

<!-- modal editar recado -->
@include('messages.edit')

<!-- final modal editar recado -->