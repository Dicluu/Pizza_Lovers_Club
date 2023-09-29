<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Employee;
use App\Models\Role;
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
        $role = Role::find($data['role_id']);
        $user->role()->disassociate();
        $user->role()->associate($role);
        $user->update($data);
        return redirect()->route('user.index');
    }

}
