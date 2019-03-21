<?php
/**
 * Created by PhpStorm.
 * User: MIW
 * Date: 21/03/2019
 * Time: 14:41
 */

namespace App\Http\Controllers;


use App\Admin;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactEmail;
use App\Notifications\InboxMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(ContactFormRequest $message, Admin $admin)
    {

        $admin->notify(new InboxMessage($message));
        // redirect the user back
        return redirect()->back()->with('message', 'Merci pour votre message !');

    }
}