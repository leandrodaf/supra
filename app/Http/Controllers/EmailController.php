<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Repositories\EmailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmailController extends AppBaseController
{
    /** @var  EmailRepository */
    private $emailRepository;

    public function __construct(EmailRepository $emailRepo)
    {
        $this->middleware('auth');
        $this->emailRepository = $emailRepo;
    }

    /**
     * Display a listing of the Email.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->emailRepository->pushCriteria(new RequestCriteria($request));
        $emails = $this->emailRepository->all();

        return view('emails.index')
            ->with('emails', $emails);
    }

    /**
     * Show the form for creating a new Email.
     *
     * @return Response
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created Email in storage.
     *
     * @param CreateEmailRequest $request
     *
     * @return Response
     */
    public function store(CreateEmailRequest $request)
    {
        $input = $request->all();

        $this->emailRepository->create($input);

        $flash = new Flash();
        $flash::success('Email saved successfully.');

        return redirect(route('emails.index'));
    }

    /**
     * Display the specified Email.
     *
     * @param  int $idEmail
     *
     * @return Response
     */
    public function show($idEmail)
    {
        $email = $this->emailRepository->findWithoutFail($idEmail);

        if (empty($email)) {
            $flash = new Flash();
            $flash::error('Email not found');

            return redirect(route('emails.index'));
        }

        return view('emails.show')->with('email', $email);
    }

    /**
     * Show the form for editing the specified Email.
     *
     * @param  int $idEmail
     *
     * @return Response
     */
    public function edit($idEmail)
    {
        $email = $this->emailRepository->findWithoutFail($idEmail);

        if (empty($email)) {
            $flash = new Flash();
            $flash::error('Email not found');

            return redirect(route('emails.index'));
        }

        return view('emails.edit')->with('email', $email);
    }

    /**
     * Update the specified Email in storage.
     *
     * @param  int $idEmail
     * @param UpdateEmailRequest $request
     *
     * @return Response
     */
    public function update($idEmail, UpdateEmailRequest $request)
    {
        $email = $this->emailRepository->findWithoutFail($idEmail);

        if (empty($email)) {
            $flash = new Flash();
            $flash::error('Email not found');

            return redirect(route('emails.index'));
        }

        $email = $this->emailRepository->update($request->all(), $idEmail);

        $flash = new Flash();
        $flash::success('Email updated successfully.');

        return redirect(route('emails.index'));
    }

    /**
     * Remove the specified Email from storage.
     *
     * @param  int $idEmail
     *
     * @return Response
     */
    public function destroy($idEmail)
    {
        $email = $this->emailRepository->findWithoutFail($idEmail);

        if (empty($email)) {
            $flash = new Flash();
            $flash::error('Email não encontrado');

            return redirect(route('emails.index'));
        }

        $this->emailRepository->delete($idEmail);

        $flash = new Flash();
        $flash::success('Email deletado com sucesso.');

        return redirect()->back();
    }
}
