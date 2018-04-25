@extends('dash.aluno.layout.app')

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card card-signup">
                <div class="card-body">
                    <div class="row">



                        <div class="col-lg-auto col-md-auto">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                                        <!--
                                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                    -->
                                        <li class="nav-item">
                                            <a class="nav-link active show" href="#dashboard-2" role="tab" data-toggle="tab" aria-selected="true">
                                                <i class="material-icons">class</i> Atividades
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#schedule-2" role="tab" data-toggle="tab" aria-selected="false">
                                                <i class="material-icons">perm_contact_calendar</i> Chamada
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="dashboard-2">
                                            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                                            <br>
                                            <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </div>
                                        <div class="tab-pane" id="schedule-2">
                                            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                            <br>
                                            <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection