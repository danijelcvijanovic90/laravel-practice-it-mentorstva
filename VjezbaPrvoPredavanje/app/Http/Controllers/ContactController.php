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
}
