<?php

namespace App\Services\User;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Service
{

    public function login($data)
    {
        if (Auth::attempt($data)) {
            return redirect()->intended(route('index'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Sign in ended with an error'
        ]);
    }

    public function registration($data)
    {
        if (User::where('email', $data['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'email is already taken'
            ]);
        }
        $user = User::create($data);
        Cart::create(['user_id' => $user->id]);
        if ($user) {
            Auth::login($user);
            return redirect(route('index'));
        }
        return redirect(route('user.registration'));
    }
}
