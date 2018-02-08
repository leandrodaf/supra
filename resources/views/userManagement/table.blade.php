<table class="table table-responsive" id="roles-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Permissão</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->id !!}</td>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>
                @foreach($user->getRoleNames() as $role)
                    {{$role}}
                @endforeach
            </td>

            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>