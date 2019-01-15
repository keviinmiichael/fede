<?php

namespace App\Http\Controllers\Front;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ResetPassword;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function getRegistro()
    {
        return view('front.clients.registro');
    }

    public function postRegistro(RegisterRequest $request)
    {
        $client = new Client(request()->all());
        $client->password = bcrypt($request->input('password'));
        $client->save();
        \Auth::guard('clients')->login($client);
        $redirect = ($request->has('checkout')) ? redirect('/carrito/checkout') : redirect('/');
        return $redirect;
    }

    public function getLogin()
    {
        return view('front.clients.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (!\Auth::guard('clients')->attempt($request->only('email', 'password'))){
            session()->flash('pass', 'true');
            return redirect()->back();
        }
        $redirect = ($request->has('checkout')) ? redirect('/carrito/checkout') : redirect('/');
        return $redirect;
    }

    public function logout()
    {
        \Auth::guard('clients')->logout();
        return redirect('/productos');
    }

    public function showLinkRequestForm()
    {
        return view('front.clients.reset-password');
    }

    public function resetPasswordEmailSent()
    {
        return view('front.clients.reset-password-email-sent');
    }

    public function sendResetLinkEmail()
    {
        //validacion
        request()->validate(
            [
                'email' => 'required|confirmed'
            ], [
                'email.required' => 'El email es obligatorio.',
                'email.confirmed' => 'La confirmación del email no coincide.',
            ]
        );

        //persistencia del token en la base
        $token = str_random(60);
        \DB::table('password_resets')->insert([
            'email' => request()->input('email'),
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        //envío del email
        $email = new ResetPassword($token);
        \Mail::to(request()->input('email'))->queue($email);
        return redirect('perfil/password-enviado');
    }

    public function resetPasswordForm($token)
    {
        $success = true;
        if ($passwordReset = \DB::table('password_resets')->where('token', $token)->first()) {
            $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $passwordReset->created_at);
            $diff = Carbon::now()->diffInDays($created_at);
        }
        if (!$passwordReset || $diff > 5) $success = false;
        return view('front.clients.new-password-form', compact('success', 'token'));
    }

    public function resetPassword()
    {
        //validacion
        request()->validate(
            [
                'password' => 'required|confirmed'
            ], [
                'password.required' => 'La contraseña es obligatoria.',
                'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            ]
        );

        if ($passwordReset = \DB::table('password_resets')->where('token', request()->input('token'))->first()) {
            if ($client = Client::where('email', $passwordReset->email)->first()) {
                $client->password = bcrypt(request()->input('password'));
                $client->save();
                \DB::table('password_resets')->where('token', request()->input('token'))->delete();
            }
        }

        return redirect('perfil/nuevo-password/exito');
    }

    public function resetPasswordSuccess()
    {
        return view('front.clients.new-password-success');
    }
}
