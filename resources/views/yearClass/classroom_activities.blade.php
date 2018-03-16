<div class="box">
    <div class="box-header with-border">
        <div class="box-tools pull-right">

            <div class="btn-group">
                <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#activitiesModal">
                    <i class="fa fa-plus"></i>
                </button>

            </div>

        </div>
        <div class="box-title" style="overflow: hidden">
            <i class="fa fa-file-text-o"></i> &nbsp; Atividades
        </div>
    </div>
    <div class="box-body">

        @include('yearClass.classroom_activities_table')
    </div>
</div>