<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'email is already taken'
            ]);
        }
        $user = User::create($data);
        Cart::create(['user_id' => $user->id]);
        if ($user){
            Auth::login($user);
            return redirect(route('index'));
        }
        return redirect(route('user.registration'));
    }
}
