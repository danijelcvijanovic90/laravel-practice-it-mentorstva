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
}
