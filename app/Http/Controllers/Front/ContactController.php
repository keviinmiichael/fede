<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;

class ContactController extends Controller
{

    public function send()
    {
        $datos = request()->only(['nombre', 'email', 'telefono', 'comentarios']);
        $email = new ContactMail($datos);
        \Mail::to(env('CONTACT_EMAIL'))->queue($email);
        session()->flash('success', true);
        return redirect('contacto');
    }
}
