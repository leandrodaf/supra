


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
                <h4 class="modal-title">Editar recado</h4>
              </div>
              <div class="modal-body">
              @include('adminlte-templates::common.errors')
                
                <div class="container">
                

                @include('messages.fields')

                           
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                
                    {!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
                            
                      
              </div>
              
            </div>
            <!-- /.modal-content -->
            {!! Form::close() !!}
            @if(!empty($message->phone))
                   <!-- Formularios remover Phones -->
                       @foreach($message->phone->toArray() as $phone)
                           {!! Form::open(['route' => ['phones.destroy', $phone['id']], 'method' => 'delete', 'id' => "#deletar-phone-".$phone['id']]) !!}
                           {!! Form::close() !!}
                       @endforeach
            @endif    
          </div>
          <!-- /.modal-dialog -->
        </div>
        
               
       