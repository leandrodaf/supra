@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <section class="content">
        <info-box></info-box>
        <!-- Info boxes -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <info-class :title="'Turmas'"></info-class>
        </div>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <year-class :title="'Situação dos Alunos'"></year-class>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <info-notifciation :title="'Notifcações'"></info-notifciation>
        </div>
    </section>

    <div class="modal fade" id="modal-doc-notifciation" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="box-tools pull-right" style="margin: 15px; z-index: 1; position: relative;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="tab-pane active" id="timeline">
                        <ul class="timeline timeline-inverse">
                            <li class="time-label">
                        <span class="bg-red date-notification">
                        </span>
                            </li>
                            <li>
                                <i id="iconetypenotification" class="fa fa-envelope bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> <span
                                                class="time-created_at"></span></span>

                                    <h3 class="timeline-header">
                                        <a href="" class="href-aluno-info"></a>
                                        <span id="title-info"></span>
                                    </h3>

                                    <div class="timeline-body">

                                    </div>

                                </div>
                            </li>

                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/features/dashSecretaria.js')}}"></script>
@endsection