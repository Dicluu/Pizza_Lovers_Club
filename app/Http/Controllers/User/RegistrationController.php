<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $data['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'email is already taken'
            ]);
        }
        $user = User::create($data);
        if ($user){
            Auth::login($user);
            return redirect(route('index'));
        }
        return redirect(route('user.registration'));
    }
}
