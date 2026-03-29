<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Models\ContactModel;


class ContactController extends Controller
{

    private $contactRepository;

    public function __construct()
    {
        $this->contactRepository = new ContactRepository();
    }

    public function index()
    {
        return view("/contact");
    }

    public function get_all_contacts()
    {
        $contacts=ContactModel::all();
        return view("all_contacts", compact('contacts'));
    }

    public function send_contact(SendContactRequest $request)
    {
        $this->contactRepository->sendContact($request);
        return redirect("/shop");
    }

    public function delete($contact)
    {
        $single_contact=$this->contactRepository->getContactById($contact);

        if($single_contact === null)
            {
                die("Contact does not exists");
            }

        $single_contact->delete();

        return redirect()->back();
    }

    public function edit_contact($contact_id)
    {
        $single_contact=$this->contactRepository->getContactById($contact_id);
        return view('edit_contact', compact('single_contact'));
    }

    public function update_contact(UpdateContactRequest $request, $contact_id)
    {
        $single_contact=$this->contactRepository->getContactById($contact_id);

        if($single_contact===null)
            {
                return redirect()->back()->with('error', 'Not valid ID');
            }

        $single_contact->update($request->validated());

        return redirect(route('contact.all'));
    }
}
