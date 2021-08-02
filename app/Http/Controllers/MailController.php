<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public  function  sendMail(SendMailRequest $request): string
    {
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $comment = $request->input('comment');

        $details = [
            'title' => "Повідомлення від $name $last_name",
            'email' => $email,
            'body' => $comment
        ];

        Mail::to('roman.lehun@gmail.com')->send(new ContactUsMail($details));

        return redirect('/success');
    }
}
