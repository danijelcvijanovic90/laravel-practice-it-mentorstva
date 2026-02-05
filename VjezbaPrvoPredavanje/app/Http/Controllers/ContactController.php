<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;


class ContactController extends Controller
{
    public function index()
    {
        return view("/contact");
    }

    public function get_all_contacts()
    {
        $contacts=ContactModel::all();
        return view("all_contacts", compact('contacts'));
    }

    public function send_contact(Request $request)
    {
        $request->validate([
            "name" => 'required|string',
            "email" => 'required|string', //if(isset($_POST['email])) && is_string($_POST['email])
            "subject" => 'required|string',
            "message" => 'required|string|min:5'
        ]);

        ContactModel::create([
            "email" => $request->get("email"),
            "name" => $request->get("name"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message")
        ]);

        return redirect("/shop");
    }

    public function delete($contact)
    {
        $single_contact=ContactModel::where(['id' => $contact])->first();

        if($single_contact === null)
            {
                die("Contact does not exists");
            }
        
        $single_contact->delete();

        return redirect()->back();
    }

    public function edit_contact($contact_id)
    {
        $single_contact=ContactModel::where(['id'=>$contact_id])->first();
        return view('edit_contact', compact('single_contact'));
    }

    public function update_contact(Request $request, $contact_id)
    {
        $single_contact=ContactModel::where(['id'=>$contact_id])->first();

        if($single_contact===null)
            {
                die('Contact id does not exists');
            }

        $validated=$request->validate([
            "name" => 'required|string',
            "email" => 'required|string',
            "subject" => 'required|string',
            "message" => 'required|string|min:5'
        ]);

        $single_contact->update($validated);

        return redirect(route('all_contacts'));
    }
}
