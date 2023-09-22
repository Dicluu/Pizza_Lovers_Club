<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(Request $request) {
        $data = $request->only(['email', 'password']);

        if (Auth::attempt($data)) {
            return redirect()->intended(route('index'));
        }

        return redirect(route('user.login'))->withErrors([
           'email' => 'Sign in ended with an error'
        ]);

    }
}
