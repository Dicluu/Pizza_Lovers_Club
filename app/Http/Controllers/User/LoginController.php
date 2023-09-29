<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(Request $request) {
        $data = $request->only(['email', 'password']);

        return $this->service->login($data);

    }
}
