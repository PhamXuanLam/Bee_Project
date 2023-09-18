<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("web.contact.index");
    }

    public function store(ContactRequest $request)
    {
        $params = $request->only(['full_name', 'email', 'subject', 'content']);
        $contact = new Contact();
        $contact->fill($params);
        $contact->save();
        return redirect('/');
    }
}
