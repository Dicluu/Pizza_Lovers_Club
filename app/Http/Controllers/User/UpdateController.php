<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use http\Env\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateController extends BaseController
{

    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('user.index');
    }

}
