


    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }
        .error { border-color: #F70202 }

    </style>



<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adicionar recado</h4>
              </div>
              <div class="modal-body">
              @include('adminlte-templates::common.errors')
                
                <div class="container">
                {!! Form::open(['route' => 'message.store', 'id' => 'criarMessage', 'autocomplete' => 'off']) !!}

                @include('messages.fields')

                           
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            
                      
              </div>
              
            </div>
            <!-- /.modal-content -->
            {!! Form::close() !!}    
          </div>
          <!-- /.modal-dialog -->
        </div>
        
               
