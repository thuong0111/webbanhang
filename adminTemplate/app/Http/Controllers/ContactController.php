<?php

namespace App\Http\Controllers;

use App\Http\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactservice;
    public function __construct(ContactService $contactservice)
    {
        $this->contactservice = $contactservice;
    }

    public function index()
    {
        return view('contact');
    }

    public function addContact(Request $request)
    {
        $this->contactservice->addContactsv($request);
        return redirect()->back();
    }
}