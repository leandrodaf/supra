<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Repositories\MessageRepository;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Flash;
use App\Helpers\Helpers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
     private $messageReposity;
    public function __construct(MessageRepository $mrepo)
    {
        $this->middleware('auth');
        $this->messageRepository = $mrepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('home');
    }

    public function messageStore(CreateMessageRequest $request)
    {
        $input = $request->all();

        try {
            $helper = new Helpers();

            $phones = array_get($input, 'phone');    

            $input['data_message'] = $helper->formataDataPtBr($input['data_message']);

            $message = $this->messageRepository->create($input);

            if (!empty($phones)) {
                $message->phones()->createMany(
                    $phones
                );
            }

           


            $flash = new Flash();
            $flash::success('Recado criado com sucesso.');

            return redirect(route('home'));
        } catch (\Exception $exception) {

            $flash = new Flash();
            $flash::success('Algo deu errado - Informe o administrador do sistema.');
            echo $exception;
            // return redirect(route('home'));
        }

    }

    //método para trazer os dados dos recados com data desc
    public function messageGetBasicData()
    {
        $m = date('m');
        $y = date('y');
        $messages = Message::select(DB::raw(' DATE_FORMAT(data_message, "%d") as dat'),DB::raw(' DATE_FORMAT(data_message, "%m") as date'),DB::raw(' DATE_FORMAT(data_message, "%d/%m/%Y") as data_message'),'id','nome')
        // ->whereMonth('data_message','=',$m)
        ->whereYear('data_message','=','20'.$y)
        ->orderBy('date','desc')
        ->orderBy('dat','desc');
        

        // whereMonth('data_message','=',$y)
        // $messges = DB::select("SELECT messages.*, 
        // DATE_FORMAT(data_message,'%d/%m/%Y')");
        
        

        return Datatables::of($messages)
            
        
            ->addColumn('link', function ($message) {
                return '
                <a href="/messages/' . $message->id . '/edit' . '" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-info"><i class="glyphicon glyphicon-edit"></i></a>
                
                
                <a href="" class="btn  btn-danger btn-xs del" value="'.$message->id.'"><i class="fa fa-fw fa-trash"></i></a>

                  
                ';
            })
            ->rawColumns(['datas', 'link'])
            ->make(true);
    }

    

    // metodo para realizar o update em recados
    public function update($idMessage, Request $request)
    {
        $helper = new Helpers();

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $input = $request->all();

        $input['data_message'] = $helper->formataDataPtBr($input['data_message']);
        $message = $this->messageRepository->findWithoutFail($idMessage);

        if (empty($message)) {
            $flash = new Flash();
            $flash::error('Recado não encontrado');

            return redirect(route('messages.index'));
        }

        $locationModel = new \App\Models\Location();

        

        $phones = array_get($input, 'phone');
        array_forget($input, 'phone');

        $departments = array_get($input, 'department');
        array_forget($input, 'department');

        $roles = array_get($input, 'role');
        array_forget($input, 'role');

        $locations = $locationModel::updateOrCreate(['id' => $pessoa->location->first()->id], $locations);


        $message->location()->sync($locations->id);
        $message = $this->messageRepository->update($input, $idMessage);


        

        if (!empty($phones)) {
            $message->phones()->createMany(
                $phones
            );
        }

        
        if (!empty($roles)) {
            $message->roles()->sync(
                $roles
            );
        }

        $flash = new Flash();
        $flash::success('Recado atualizado com sucesso.');

        return redirect(route('home'));
    }

    //metodo para trazer no form os dados do recado (acessado via ajax)
    public function getInfoMessage($idMessage)
    {
        $message = $this->messageRepository->findWithoutFail($idMessage);

        $resposta = [];

        $resposta['id'] = $message->id;
        $resposta['nome'] = $message->nome;
        // $resposta['dataNascimento'] = $aluno->data_nascimento_aluno->format('d/m/Y');
        // $resposta['sexo'] = $aluno->gender->nome;
        // $resposta['rg'] = $aluno->rg_aluno;

        return response()->json($resposta);
    }
    
    
    //metodo para realizar o delete de recados (via ajax)
    public function destroy($idMessage)
    {
        $message = $this->messageRepository->findWithoutFail($idMessage);

        // if (empty($message)) {
        //     $flash = new Flash();
        //     $flash::error('Recado não encontrado.');

        //     return redirect(route('home'));
        // }

        $this->messageRepository->delete($idMessage);

        // $flash = new Flash();
        // $flash::success('Recado deletado com sucesso.');

        return redirect(route('home'));
    }

    

}
