<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate
        $creds = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        /*if (auth()->attempt($creds)) {
            session()->regenerate();

            return redirect('/')->with('success', 'You have been logged in.');
        }*/

        // authenticate
        if (! auth()->attempt($creds)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are invalid'
            ]);
        }

        // protect against session fixation
        session()->regenerate();

        return redirect('/')->with('success', 'You have been logged in.');

        // above and below are the same
        /*return back()
            ->withInput()
            ->withErrors(['email' => 'The provided credentials are invalid']);*/
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You are logged out.');
    }
}
