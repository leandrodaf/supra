<table class="table table-striped table-bordered dt-responsive nowrap table-responsive">

    <thead>
    <tr>
        <th>Dcumento</th>
        <th>Data</th>
        <th class="text-center">Baixar</th>
    </tr>
    </thead>
    <tbody>

    @foreach($pessoa->fileentry as $file)
        <tr>
            <td>{{$file->original_filename}}</td>
            <td>{{$file->created_at->format('d/m/Y')}}</td>
            <td class="text-center">
                <a href="/disk/file?file= {{$file->filename}}"> <i class="fa fa-download"></i></a>
                <a href="/disk/file/delete?file= {{$file->filename}}" aria-expanded="false" data-toggle="tooltip"
                   data-placement="right" title="" data-original-title="Excluir Documento">
                    <i class="fa fa-trash" style="color: rgb(203, 32, 39);"></i>
                </a>
            </td>
        </tr>
    @endforeach


    </tbody>
</table>


