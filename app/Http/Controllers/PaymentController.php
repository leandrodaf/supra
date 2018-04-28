<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Helpers\Helpers;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;


class PaymentController extends Controller
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymetRepo)
    {
        $this->middleware('auth');
        $this->paymentRepository = $paymetRepo;
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        Flash::success('Tipo de pagamento salvo com sucesso.');

        return redirect(route('payments.index'));
    }

    public function show($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Tipo de pagamento não encontrado');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payment', $payment);
    }

    public function edit($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Tipo de pagamento não encontrado');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')->with('payment', $payment);
    }

    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($payment)) {
            Flash::error('Tipo de pagamento não encontrado');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Flash::success('Tipo de pagamento atualizado com sucesso.');

        return redirect(route('payments.index'));
    }

    public function index(Request $request)
    {
        $this->paymentRepository->pushCriteria(new RequestCriteria($request));
        $payments = $this->paymentRepository->all();
        
        return view('payments.index')
            ->with('payments',$payments);
    }

    public function destroy($id)
    {
        $payment = $this->paymentRepository->findWithoutFail($id);

        if (empty($typeActive)) {
            Flash::error('Tipo de pagamento não encontrado');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success('Tipo de pagamento deletado com sucesso.');

        return redirect(route('payments.index'));
    }




}
