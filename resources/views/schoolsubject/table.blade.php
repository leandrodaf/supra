<table class="table table-responsive" id="schoolsubject-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Status</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($schoolSubjects as $schoolSubject)
        <tr>
            <td>{!! $schoolSubject->nome !!}</td>
            <td>{!! $schoolSubject->status != 0 ? "Ativo": "Inativo"!!}</td>
            <td>
                {!! Form::open(['route' => ['schoolsubject.destroy', $schoolSubject->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('schoolsubject.edit', [$schoolSubject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {{--<a href="{!! route('schoolsubject.edit', [$schoolSubject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {{--{!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>