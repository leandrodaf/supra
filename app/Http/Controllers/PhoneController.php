<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Repositories\PhoneRepository;
use Laracasts\Flash\Flash;

class PhoneController extends Controller
{
    /** @var  EmailRepository */
    private $phoneRepository;

    public function __construct(PhoneRepository $phoneRepo)
    {
        $this->middleware('auth');
        $this->phoneRepository = $phoneRepo;
    }


    /**
     * Remove the specified Email from storage.
     *
     * @param  int $idEmail
     *
     * @return Response
     */
    public function destroy($idPhone)
    {
        $phone = $this->phoneRepository->findWithoutFail($idPhone);

        if (empty($phone)) {
            $flash = new Flash();
            $flash::error('Telefone não encontrado');

            return response()->json(['message' => 'Erro ao excluir o telefone']);
        }

        $this->phoneRepository->delete($idPhone);

        $flash = new Flash();
        $flash::success('Telefone deletado com sucesso . ');

        return redirect()->back();
    }
}
