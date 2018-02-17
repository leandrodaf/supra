<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Matérias</h3>
        <div class="box-tools pull-right">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#schoolsubjects-modal">
                <i class="fa fa-list-alt"></i>
            </button>
        </div>
    </div>
    <div class="box-body">

    </div>
</div>


<div id="schoolsubjects-modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 500    px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Adicionar matérias</h4>
            </div>

            <div class="modal-body">
                <div id="loadingResponsavel" class="overlay" style="display:none;">
                    <div class="fa fa-refresh fa-spin"></div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <select name="schoolsubjects" id="schoolsubjects" class="form-control" required="required">
                            @foreach($schoolsubjects as $subjects)
                                <option value="{{$subjects->id}}">{{$subjects->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary add-new">Adicionar</button>
                    </div>
                </div>

                <p></p>

                <div class="row">
                    <div class="col-sm-12">
                        <ul id="listSchoolSubjects" class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <span class="badge" style="background-color: #FFFFFF; color: #333333; font-size: 15px">
                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                    </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>