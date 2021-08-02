<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact-us');
    }
}
