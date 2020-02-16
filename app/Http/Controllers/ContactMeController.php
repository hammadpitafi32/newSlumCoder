<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactMeRequest;
use App\Http\Requests\UpdateContactMeRequest;
use App\Repositories\ContactMeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContactMeController extends AppBaseController
{
    /** @var  ContactMeRepository */
    private $contactMeRepository;

    public function __construct(ContactMeRepository $contactMeRepo)
    {
        $this->contactMeRepository = $contactMeRepo;
    }

    /**
     * Display a listing of the ContactMe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contactMes = $this->contactMeRepository->all();

        return view('contact_mes.index')
            ->with('contactMes', $contactMes);
    }

    /**
     * Show the form for creating a new ContactMe.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact_mes.create');
    }

    /**
     * Store a newly created ContactMe in storage.
     *
     * @param CreateContactMeRequest $request
     *
     * @return Response
     */
    public function store(CreateContactMeRequest $request)
    {
        $input = $request->all();

        $contactMe = $this->contactMeRepository->create($input);

        Flash::success('Contact Me saved successfully.');

        return redirect(route('contactMes.index'));
    }

    /**
     * Display the specified ContactMe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactMe = $this->contactMeRepository->find($id);

        if (empty($contactMe)) {
            Flash::error('Contact Me not found');

            return redirect(route('contactMes.index'));
        }

        return view('contact_mes.show')->with('contactMe', $contactMe);
    }

    /**
     * Show the form for editing the specified ContactMe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactMe = $this->contactMeRepository->find($id);

        if (empty($contactMe)) {
            Flash::error('Contact Me not found');

            return redirect(route('contactMes.index'));
        }

        return view('contact_mes.edit')->with('contactMe', $contactMe);
    }

    /**
     * Update the specified ContactMe in storage.
     *
     * @param int $id
     * @param UpdateContactMeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactMeRequest $request)
    {
        $contactMe = $this->contactMeRepository->find($id);

        if (empty($contactMe)) {
            Flash::error('Contact Me not found');

            return redirect(route('contactMes.index'));
        }

        $contactMe = $this->contactMeRepository->update($request->all(), $id);

        Flash::success('Contact Me updated successfully.');

        return redirect(route('contactMes.index'));
    }

    /**
     * Remove the specified ContactMe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactMe = $this->contactMeRepository->find($id);

        if (empty($contactMe)) {
            Flash::error('Contact Me not found');

            return redirect(route('contactMes.index'));
        }

        $this->contactMeRepository->delete($id);

        Flash::success('Contact Me deleted successfully.');

        return redirect(route('contactMes.index'));
    }
}
